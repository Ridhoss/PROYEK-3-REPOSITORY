@extends('layouts.layout')

@section('content')
    <a href="mahasiswa/add-mahasiswa" class="btn btn-primary">Add</a>

    <table class="table table-striped mt-2">
        <thead>
            <tr class="table-primary text-center">
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Tahun Angkatan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!$students->isEmpty())
                @php
                    $i = 1;
                @endphp
                @foreach ($students as $student)
                    <tr class="text-center">
                        <td>{{ $i++ }}</td>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->user->username }}</td>
                        <td>{{ $student->user->full_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($student->user->tgl_lahir)->format('d F Y') }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->entry_year }}</td>
                        <td>
                            <a class="btn btn-primary" href="mahasiswa/detail-mahasiswa/{{ $student->nim }}">Detail</a>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center text-danger">
                        Data tidak ditemukan / Kosong!
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
