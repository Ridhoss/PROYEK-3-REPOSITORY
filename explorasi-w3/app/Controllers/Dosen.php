<?php

namespace App\Controllers;

class Dosen extends BaseController
{
    public function display()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Home',
            'content' => 'home'
        ];

        return view('layout/layout', $data);
    }

    // public function tampilMahasiswa(): string
    // {
    //     $model = new MahasiswaModels();

    //     $data = $model->getMahasiswa();

    //     return view('mahasiswa', ['data' => $data]);
    // }

    // public function layout(): string
    // {
    //     $model = new MahasiswaModels();

    //     $data = [
    //         'title' => 'Home',
    //         'content' => 'mahasiswa'
    //     ];


    //     return view('layout/layout', $data);
    // }
}
