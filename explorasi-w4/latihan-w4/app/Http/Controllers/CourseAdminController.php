<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseAdminController
{
    public function index_course()
    {
        $data_course = courses::get();

        $data = [
            'courses' => $data_course,
        ];

        return view('pages.admin.course.index', $data);
    }

    public function index_tambah()
    {
        return view('pages.admin.course.tambah');
    }

    public function action_tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_code' => 'required',
            'course_name' => 'required',
            'credits' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/course/add-course')
                ->withErrors($validator)
                ->withInput();
        }

        $course = courses::create([
            'course_code' => $request->course_code,
            'course_name' => $request->course_name,
            'credits' => $request->credits,
        ]);

        return redirect('/admin/course');
    }
}
