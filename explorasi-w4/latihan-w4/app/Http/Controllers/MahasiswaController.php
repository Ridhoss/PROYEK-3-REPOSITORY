<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController
{
    public function index() {
        return view('pages.mahasiswa.home');
    }
}
