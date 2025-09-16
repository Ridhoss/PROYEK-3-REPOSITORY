<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\takes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseMahasiswaController
{

    public function index()
    {
        $dataTakes = takes::where('student_id', Auth::user()->student->student_id)->with('course')->get();

        $data = [
            'coursesTakes' => $dataTakes,
        ];

        return view('pages.mahasiswa.course.index', $data);
    }

    public function index_tambah()
    {

        $studentId = Auth::user()->student->student_id;

        $data_course = courses::whereNotIn('course_id', function ($query) use ($studentId) {
            $query->select('course_id')
                ->from('takes')
                ->where('student_id', $studentId);
        })->get();

        $data = [
            'courses' => $data_course,
        ];

        return view('pages.mahasiswa.course.ambil', $data);
    }

    public function action_tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pilih' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/mahasiswa/course/add-course')
                ->withErrors($validator)
                ->withInput();
        }

        foreach ($request->pilih as $pilih) {
            takes::create([
                'enroll_date' => Carbon::today(),
                'student_id' => Auth::user()->student->student_id,
                'course_id' => $pilih
            ]);
        }

        return redirect('/mahasiswa/course');
    }
}
