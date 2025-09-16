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

    <a href="/admin/course" class="btn btn-outline-secondary">Back</a>

    <div>
        <form action="/admin/course/add-course" method="POST"
            class="d-flex align-items-center justify-content-center flex-column gap-2 mt-3 w-100">
            @csrf
            <div class="w-50">
                <label for="kode_matakuliah" class="form-label">KODE MATA KULIAH</label>
                <input type="text" class="form-control" id="kode_matakuliah" name="course_code" placeholder="Kode Mata Kuliah"
                    value="{{ old('kode_matakuliah') }}" required>
            </div>

            <div class="w-50">
                <label for="nama_matakuliah" class="form-label">NAMA MATA KULIAH</label>
                <input type="text" class="form-control" id="nama" name="course_name" placeholder="Nama Mata Kuliah"
                    value="{{ old('nama') }}" required>
            </div>

            <div class="w-50">
                <label for="jmlh_sks" class="form-label">JUMLAH SKS</label>
                <input type="text" class="form-control" id="jmlh_sks" name="credits" placeholder="Jumlah SKS"
                    value="{{ old('nim') }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3 w-50">Submit</button>
        </form>
    </div>
@endsection
