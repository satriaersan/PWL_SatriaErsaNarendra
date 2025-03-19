@extends('layout.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Manage Kategori</h1>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm my-3 px-4 py-2 rounded-pill shadow-sm d-flex align-items-center">
                        <i class="fas fa-plus me-2"></i> <strong>Tambah</strong>
                    </a>
                </div>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
