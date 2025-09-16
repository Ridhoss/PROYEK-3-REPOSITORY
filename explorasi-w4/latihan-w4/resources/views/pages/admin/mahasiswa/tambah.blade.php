@extends('layouts.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger position-absolute top-0 end-0 alert-dismissible fade show" role="alert"">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/admin/mahasiswa" class="btn btn-outline-secondary">Back</a>

    <div>
        <form action="/admin/mahasiswa/add-mahasiswa" method="POST"
            class="d-flex align-items-center justify-content-center flex-column gap-2 mt-3 w-100">
            @csrf
            <div class="w-50">
                <label for="username" class="form-label">USERNAME</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    value="{{ old('username') }}" required>
            </div>

            <div class="w-50">
                <label for="password" class="form-label">PASSWORD</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    value="{{ old('password') }}" required>
            </div>

            <div class="w-50">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM"
                    value="{{ old('nim') }}" required>
            </div>

            <div class="w-50">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                    value="{{ old('nama') }}" required>
            </div>

            <div class="w-50">
                <label for="tgl_lahir" class="form-label">TANGGAL LAHIR</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
            </div>

            <div class="w-50">
                <label for="jurusan" class="form-label">JURUSAN</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan"
                    value="{{ old('jurusan') }}" required>
            </div>

            <div class="w-50">
                <label for="thn_angkatan" class="form-label">TAHUN ANGKATAN</label>
                <input type="text" class="form-control" id="thn_angkatan" name="thn_angkatan"
                    placeholder="Tahun Angkatan" value="{{ old('thn_angkatan') }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3 w-50">Submit</button>
        </form>
    </div>
@endsection
