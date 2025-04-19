{{-- @extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create') }}">Tambah</a>
                <button onclick="modalAction('{{ url('kategori/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div> 
@endsection

@push('css')
@endpush

@push('js')
    <script>
        // $(document).ready(function() {
        //     var dataLevel = $('#table_kategori').DataTable({
        //         serverSide: true,
        //         ajax: {
        //             "url": "{{ url('kategori/list') }}",
        //             "dataType": "json",
        //             "type": "POST",
        //         },
        //         columns: [{
        //                 data: "DT_RowIndex",
        //                 className: "text-center",
        //                 orderable: false,
        //                 searchable: false
        //             },
        //             {
        //                 data: "kategori_kode",
        //                 className: "",
        //                 orderable: true,
        //                 searchable: true
        //             },
        //             {
        //                 data: "kategori_nama",
        //                 className: "",
        //                 orderable: true,
        //                 searchable: true
        //             },
        //             {
        //                 data: "aksi",
        //                 className: "",
        //                 orderable: false,
        //                 searchable: false
        //             }
        //         ]
        //     });

        function modalAction(url = ''){     
             $('#myModal').load(url,function() {         
                 $('#myModal').modal('show');     
             }); 
         } 
 
         var dataKategori;
         $(document).ready(function() {
             dataKategori = $('#table_kategori').DataTable({
                 // serverSide: true, jika ingin menggunakan server side processing
                 serverSide: true,
                 ajax: {
                     "url": "{{ url('kategori/list') }}",
                     "dataType": "json",
                     "type": "POST",
                 },
                 columns: [
                     {
                         //nomor urut dari laravel datatable addIndexColumn()
                         data: "DT_RowIndex",
                         className: "text-center",
                         orderable: false,
                         searchable: false
                     },
                     {
                         data: "kategori_kode",
                         className: "",
                         orderable: true,    //jika ingin kolom ini bisa diurutkan
                         searchable: true    //jika ingin kolom ini bisa dicari
                     },
                     {
                         data: "kategori_nama",
                         className: "",
                         orderable: true,
                         searchable: true
                     },
                     {
                         data: "aksi",
                         className: "",
                         orderable: false,
                         searchable: false
                     }
                 ],
             });
        });
    </script>
@endpush --}}

@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/kategori/import') }}')" class="btn btn-sm mt-1 btn-info">Import Excel</button>
                {{-- <a href="{{ url('/kategori/create') }}" class="btn btn-primary">Tambah Data</a> --}}
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/export_excel') }}"><i class="fa fa-file-excel"></i> Export Excel</a>
                <a class="btn btn-sm btn-secondary mt-1" href="{{ url('kategori/export_pdf') }}"><i class="fa fa-file-pdf"></i> Export PDF</a>
                <button onclick="modalAction('{{ url('kategori/create_ajax') }}')" class="btn btn-sm mt-1 btn-success ">Tambah Data
                    (Ajax)</button>
            </div>
        </div>
        <div class="card-body">
            {{-- Alert untuk Success --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Alert untuk Error --}}
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog"
        databackdrop="static"data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var dataKategori;
        $(document).ready(function() {
            dataKategori = $('#table_kategori').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('kategori/list') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "kategori_kode",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "kategori_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
