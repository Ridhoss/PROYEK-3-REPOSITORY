<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseAdminController;
use App\Http\Controllers\CourseMahasiswaController;
use App\Http\Controllers\MahasiswaAdminController;
use App\Http\Controllers\MahasiswaController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/home', 'index');
    });

    Route::controller(MahasiswaAdminController::class)->group(function () {
        Route::get('/admin/mahasiswa', 'index');
        Route::get('/admin/mahasiswa/add-mahasiswa', 'index_tambah');
        Route::get('/admin/mahasiswa/detail-mahasiswa/{slug}', 'index_detail_mahasiswa');
        Route::post('/admin/mahasiswa/add-mahasiswa', 'action_tambah');
    });

    Route::controller(CourseAdminController::class)->group(function () {
        Route::get('/admin/course', 'index_course');
        Route::get('/admin/course/add-course', 'index_tambah');
        Route::post('/admin/course/add-course', 'action_tambah');
    });
});

Route::middleware(['auth', 'role:Students'])->group(function () {
    Route::controller(MahasiswaController::class)->group(function () {
        Route::get('/mahasiswa/home', 'index');
    });

    Route::controller(CourseMahasiswaController::class)->group(function () {
        Route::get('/mahasiswa/course', 'index');
        Route::get('/mahasiswa/course/add-course', 'index_tambah');
        Route::post('/mahasiswa/course/add-course', 'action_tambah');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index_login')->name('login');
        Route::get('/register', 'index_register');
        Route::post('/login', 'action_login');
    });
});

Route::middleware('auth')->post('/logout', [AuthController::class, 'action_logout']);
