@extends('layouts.layout')

@section('content')
    <h1>Welcome Admin!</h1>
    <h3>Selamat Datang {{ Auth::user()->full_name }}</h3>
@endsection
