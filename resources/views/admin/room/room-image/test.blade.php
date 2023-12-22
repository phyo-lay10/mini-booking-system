<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CourseOutlineDetail;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseOutline;

class CourseOutlineController extends Controller
{
    //Course Outline

    public function courseOutline(Request $request, $course_id) // index page
    {
        $courseOutlineId = $request->query('edit'); // Edit
        if (isset($courseOutlineId)) {
            $courseOutlineEdit = CourseOutline::find($courseOutlineId);
            $courseEdit = $courseOutlineEdit->course;
            $courseOutlines = CourseOutline::where('course_id', $courseEdit->id)->get();
            $courseOutlineDescs = CourseOutlineDetail::where('course_outline_id', $courseOutlineId)->get();
            return view('admin.courses.course_outline.index',  compact('courseOutlines', 'courseOutlineEdit', 'courseEdit', 'courseOutlineDescs'));
        } else {
            $course = Course::find($course_id);
            $courseOutlines = $course->courseOutlines; //think
            return view('admin.courses.course_outline.index',  compact('courseOutlines', 'course'));
        }
    }

    public function courseOutlineStore(Request $request, $course_id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $courseOutline = CourseOutline::create([
            'title' => $request->title,
            'course_id' => $course_id
        ]);

        if ($request->descriptions) {
            $descriptions = [];

            for ($i = 0; $i < count($request->descriptions); $i++) {
                if ($request->descriptions[$i] !== null) {
                    array_push($descriptions, $request->descriptions[$i]);
                }
            }

            for ($i = 0; $i < count($descriptions); $i++) {
                CourseOutlineDetail::create([
                    'description' => $descriptions[$i],
                    'course_outline_id' => $courseOutline->id,
                ]);
            }
        }

        return redirect()->route('course_outline.index', $course_id)->with('successMsg', 'A course_outline has been created successfully');
    }

    public function courseOutlineEdit($courseOutlineId)

    {
        dd($courseOutlineId);
    }

    public function courseOutlineUpdate(Request $request, $courseOutlineId)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $courseOutline = CourseOutline::find($courseOutlineId);
        $course = $courseOutline->course;
        CourseOutline::find($courseOutlineId)->update([
            'title' => $request->title,
            'course_id' => $course->id,
        ]);
        CourseOutlineDetail::where('course_outline_id', $courseOutlineId)->delete();

        if ($request->descriptions) {
            $descriptions = [];

            for ($i = 0; $i < count($request->descriptions); $i++) {
                if ($request->descriptions[$i] !== null) {
                    array_push($descriptions, $request->descriptions[$i]);
                }
            }

            for ($i = 0; $i < count($descriptions); $i++) {
                CourseOutlineDetail::create([
                    'description' => $descriptions[$i],
                    'course_outline_id' => $courseOutlineId,
                ]);
            }
        }
        return redirect()->route('course_outline.index', $course->id)->with('successMsg', 'A course_outline has been updated successfully');
    }
    public function courseOutlineDelete($courseOutlineId)
    {
        CourseOutline::find($courseOutlineId)->delete();

        return back()->with('successMsg', 'A course_outline has been deleted successfully');
    }
}