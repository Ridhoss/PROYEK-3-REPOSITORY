@extends('layouts.layout')

@section('content')
    <a href="course/add-course" class="btn btn-primary">Add</a>

    <table class="table table-striped mt-2">
        <thead>
            <tr class="table-primary text-center">
                <th scope="col">No</th>
                <th scope="col">Kode Mata Kuliah</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">Jumlah SKS</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!$courses->isEmpty())
                @php
                    $i = 1;
                @endphp
                @foreach ($courses as $course)
                    <tr class="text-center">
                        <td>{{ $i++ }}</td>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->credits }}</td>
                        <td>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
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
