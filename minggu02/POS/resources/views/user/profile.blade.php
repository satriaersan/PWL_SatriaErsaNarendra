@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Profil Pengguna</h1>
        <p class="text-gray-700">ID Pengguna: {{ $id }}</p>
    </div>
@endsection
