@extends('layouts.layout')

@section('content')
    <a href="/mahasiswa" class="btn btn-outline-secondary">Back</a>

    <div class="d-flex align-items-center justify-content-center flex-column gap-2 mt-3">
        <h3 class="card-title m-0">{{ $student->user->full_name }}</h3>
        <h5 class="card-subtitle text-body-secondary m-0">NIM: {{ $student->nim }}</h5>
        <p class="card-text m-0">Tanggal Lahir: {{ \Carbon\Carbon::parse($student->user->tgl_lahir)->format('d F Y') }}</p>
    </div>
@endsection
