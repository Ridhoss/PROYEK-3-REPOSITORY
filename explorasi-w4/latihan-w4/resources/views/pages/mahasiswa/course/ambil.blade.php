@extends('layouts.mahasiswa')

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

    <a href="/mahasiswa/course" class="btn btn-outline-secondary">Back</a>

    <h3 class="text-center">Mata Kuliah</h3>

    <form action="/mahasiswa/course/add-course" method="post">
        @csrf
        <table class="table table-striped mt-4">
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
                                <input type="checkbox" name="pilih[]" value="{{ $course->course_id }}">
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
        <div class="position-relative mt-5">
            <button class="btn btn-success position-absolute bottom-0 end-0" type="submit">Save</button>
        </div>
    </form>
@endsection
