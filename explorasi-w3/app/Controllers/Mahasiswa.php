<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mahasiswa as ModelsMahasiswa;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MahasiswaModels;


class Mahasiswa extends BaseController
{
    public function index()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/');
        }


        $model = new MahasiswaModels();
        $data = $model->getMahasiswa();

        $data = [
            'title' => 'Mahasiswa',
            'content' => 'mahasiswa',
            'students' => $data
        ];

        return view('layout/layout', data: $data);
    }

    public function detailIndex($id)
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $model = new ModelsMahasiswa();
        $data = $model->where('id', $id)->first();

        $data = [
            'title' => 'Mahasiswa - ' . $data['nama'],
            'content' => 'detail_mahasiswa',
            'student' => $data
        ];

        return view('layout/layout', data: $data);
    }

    public function tambahIndex()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Tambah Mahasiswa',
            'content' => 'tambah_mahasiswa',
        ];

        return view('layout/layout', data: $data);
    }
}
