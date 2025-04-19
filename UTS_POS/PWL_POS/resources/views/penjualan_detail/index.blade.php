@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('penjualan_detail/create_ajax') }}')"
                    class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <!-- Filter Berdasarkan Barang -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="filter_barang_id">Filter Barang:</label>
                    <select class="form-control" id="filter_barang_id" name="filter_barang_id">
                        <option value="">- Semua Barang -</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan_detail">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penjualan</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
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
    {{-- <script>
    function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }
        var dataUser;
$(document).ready(function () {
    dataUser = $('#table_penjualan_detail').DataTable({
        serverSide: true,
        ajax: {
            url: "{{ url('penjualan_detail/list') }}", 
            type: "POST",
            dataType: "json"
        },
        columns: [
            {
                data: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'penjualan_id',
                orderable: true,
                searchable: true
            },
            {
                data: 'barang.barang_nama',
                orderable: true,
                searchable: true
            },
            {
                data: 'harga_barang',
                orderable: true,
                searchable: true
            },
            {
                data: 'jumlah_barang',
                orderable: true,
                searchable: true
            },
            {
                data: 'aksi',
                orderable: false,
                className: "text-center",
                searchable: false
            }
        ]
    });
}); --}}



    @push('js')
        <script>
            function modalAction(url = '') {
                $('#myModal').load(url, function() {
                    $('#myModal').modal('show');
                });
            }

            var dataUser;

            $(document).ready(function() {
                dataUser = $('#table_penjualan_detail').DataTable({
                    serverSide: true,
                    ajax: {
                        url: "{{ url('penjualan_detail/list') }}",
                        type: "POST",
                        dataType: "json",
                        data: function(d) {
                            d.barang_id = $('#filter_barang_id').val(); // kirim data filter barang
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            className: 'text-center',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'penjualan_id',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'barang.barang_nama',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'harga_barang',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'jumlah_barang',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'aksi',
                            orderable: false,
                            className: "text-center",
                            searchable: false
                        }
                    ]
                });

                $('#filter_barang_id').on('change', function() {
                    dataUser.ajax.reload();
                });
            });
        </script>
    @endpush

    {{-- </script>
@endpush --}}
