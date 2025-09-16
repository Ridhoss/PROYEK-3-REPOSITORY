<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MahasiswaAdminController
{
    public function index()
    {
        $students = students::with('user')->get();

        $data = [
            'students' => $students,
        ];

        return view('pages.admin.mahasiswa.index', $data);
    }

    public function index_tambah()
    {
        return view('pages.admin.mahasiswa.tambah');
    }

    public function action_tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'nim' => 'required||unique:students',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jurusan' => 'required',
            'thn_angkatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/mahasiswa/add-mahasiswa')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'full_name' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'role' => 'Students'
        ]);

        $user->student()->create([
            'nim'     => $request->nim,
            'major' => $request->jurusan,
            'entry_year' => $request->thn_angkatan,
        ]);

        return redirect('/admin/mahasiswa');
    }

    public function index_detail_mahasiswa($nim)
    {
        $student = students::where('nim', $nim)->with('user')->first();

        $data = [
            'student' => $student,
        ];

        return view('pages.admin.mahasiswa.detail', $data);
    }
}
