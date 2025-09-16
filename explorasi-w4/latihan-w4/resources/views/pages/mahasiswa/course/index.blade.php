@extends('layouts.mahasiswa')

@section('content')
    <a href="/mahasiswa/course/add-course" class="btn btn-primary">Add</a>

    <h3 class="text-center">Mata Kuliah Diambil</h3>

    <table class="table table-striped mt-4">
        <thead>
            <tr class="table-primary text-center">
                <th scope="col">No</th>
                <th scope="col">Kode Mata Kuliah</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">Jumlah SKS</th>
            </tr>
        </thead>
        <tbody>
            @if (!$coursesTakes->isEmpty())
                @php
                    $i = 1;
                @endphp
                @foreach ($coursesTakes as $takes)
                    <tr class="text-center">
                        <td>{{ $i++ }}</td>
                        <td>{{ $takes->course->course_code }}</td>
                        <td>{{ $takes->course->course_name }}</td>
                        <td>{{ $takes->course->credits }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center text-danger">
                        Data tidak ditemukan / Kosong!
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
