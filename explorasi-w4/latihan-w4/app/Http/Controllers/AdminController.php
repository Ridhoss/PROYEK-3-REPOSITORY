<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController
{
    public function index() {
        return view('pages.admin.home');
    }
}
