@extends('layouts.mahasiswa')

@section('content')
    <h1>Welcome Mahasiswa!</h1>
    <h3>Selamat Datang {{ Auth::user()->full_name }}</h3>
@endsection
