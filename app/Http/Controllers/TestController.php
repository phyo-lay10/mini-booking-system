<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.room.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);
        $data['image'] = $imageName;

        Room::create($data);
        return redirect()->route('rooms.index')->with('success', 'You have successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();

        $room = Room::find($id);
        return view('admin.room.edit', compact('room', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $data = $this->validateRequest($request);

        if ($request->image) {
            $roomImage = $room->image;
            File::delete('storage/images/' . $roomImage);

            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        $room->update($data);
        return redirect()->route('rooms.index')->with('success', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::find($id)->delete();
        return back()->with('success', 'You have successfully deleted!');
    }

    // private function validateRequest(Request $request, $isUpdate = true)
    // {
    //     $rules = [
    //         'name' => 'required',
    //         'category_id' => 'required',
    //         'price' => 'required',
    //     ];

    //     if (!$isUpdate) {
    //         $rules['image'] = 'required|image|mimes:jpg,jpeg,png';
    //     } else {
    //         $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png';
    //     }

    //     return $request->validate($rules);
    // }


    private function validateRequest(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ];

        if ($request->isMethod('put') || $request->isMethod('patch')) {
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png';
        } else {
            $rules['image'] = 'required|image|mimes:jpg,jpeg,png';
        }

        return $request->validate($rules);
    }
}
