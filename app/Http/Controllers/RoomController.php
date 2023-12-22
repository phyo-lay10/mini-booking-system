<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        $data['image1'] = $this->uploadImages($request, 'image1');
        $data['image2'] = $this->uploadImages($request, 'image2');
        $data['image3'] = $this->uploadImages($request, 'image3');
        $data['image4'] = $this->uploadImages($request, 'image4');

        // $image1 = $request->image1;
        // $imageName1 = uniqid() . '_' . $image1->getClientOriginalName();
        // $image1->storeAs('public/images', $imageName1);
        // $data['image1'] = $imageName1;

        // $image2 = $request->image2;
        // $imageName2 = uniqid() . '_' . $image2->getClientOriginalName();
        // $image2->storeAs('public/images', $imageName2);
        // $data['image2'] = $imageName2;

        // $image3 = $request->image3;
        // $imageName3 = uniqid() . '_' . $image3->getClientOriginalName();
        // $image3->storeAs('public/images', $imageName3);
        // $data['image3'] = $imageName3;

        // $image4 = $request->image4;
        // $imageName4 = uniqid() . '_' . $image4->getClientOriginalName();
        // $image4->storeAs('public/images', $imageName4);
        // $data['image4'] = $imageName4;

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

        $data['image1'] = $this->updateImage($request, $room->image1, 'image1');
        $data['image2'] = $this->updateImage($request, $room->image2, 'image2');
        $data['image3'] = $this->updateImage($request, $room->image3, 'image3');
        $data['image4'] = $this->updateImage($request, $room->image4, 'image4');

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

    private function uploadImages(Request $request, $imageName)
    {
        $image = $request->$imageName;

        if ($image) {
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            return $imageName;
        }
        return null;
    }

    private function updateImage(Request $request, $existingImage, $imageName)
    {
        if ($request->hasFile($imageName)) {
            File::delete('public/images/' . $existingImage);
            return $this->uploadImages($request, $imageName);
        }
        return $existingImage;
    }

    private function deleteImages(Room $room)
    {
        File::delete('public/images/' . $room->image1);
        File::delete('public/images/' . $room->image2);
        File::delete('public/images/' . $room->image3);
        File::delete('public/images/' . $room->image4);
    }

    private function validateRequest(Request $request)
    {
        $rules = [
            'no' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ];

        if ($request->isMethod('put') || $request->isMethod('patch')) {
            $rules += [
                'image1' => 'nullable|image|mimes:jpg,jpeg,png',
                'image2' => 'nullable|image|mimes:jpg,jpeg,png',
                'image3' => 'nullable|image|mimes:jpg,jpeg,png',
                'image4' => 'nullable|image|mimes:jpg,jpeg,png',
            ];
        } else {
            $rules += [
                'image1' => 'required|image|mimes:jpg,jpeg,png',
                'image2' => 'required|image|mimes:jpg,jpeg,png',
                'image3' => 'required|image|mimes:jpg,jpeg,png',
                'image4' => 'required|image|mimes:jpg,jpeg,png',
            ];
        }

        // if ($request->isMethod('put') || $request->isMethod('patch')) {
        //     $rules['image1'] = 'nullable|image|mimes:jpg,jpeg,png';
        //     $rules['image2'] = 'nullable|image|mimes:jpg,jpeg,png';
        //     $rules['image3'] = 'nullable|image|mimes:jpg,jpeg,png';
        //     $rules['image4'] = 'nullable|image|mimes:jpg,jpeg,png';
        // } else {
        //     $rules['image1'] = 'required|image|mimes:jpg,jpeg,png';
        //     $rules['image2'] = 'required|image|mimes:jpg,jpeg,png';
        //     $rules['image3'] = 'required|image|mimes:jpg,jpeg,png';
        //     $rules['image4'] = 'required|image|mimes:jpg,jpeg,png';
        // }

        return $request->validate($rules);
    }

}
