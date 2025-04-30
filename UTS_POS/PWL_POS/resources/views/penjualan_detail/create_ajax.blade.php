{{-- <form action="{{ url('/penjualan_detail/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Penjualan</label>
                    <select name="penjualan_id" id="penjualan_id" class="form-control" required>
                        <option value="">- Pilih Kode Penjualan -</option>
                        @foreach ($penjualan as $p)
                            <option value="{{ $p->penjualan_id }}">{{ $p->penjualan_kode ?? 'ID ' . $p->penjualan_id }}</option>
                        @endforeach
                    </select>
                    <small id="error-penjualan_id" class="error-text form-text text-danger"></small>
                </div>
                
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">- Pilih Barang -</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->barang_id }}" data-harga="{{ $b->harga_jual }}">
                                {{ $b->barang_nama }}
                            </option>
                        @endforeach
                    </select>
                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga_barang" id="harga_barang" class="form-control" readonly required min="1">
                    <small id="error-harga_barang" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" required min="1">
                    <small id="error-jumlah_barang" class="error-text form-text text-danger"></small>
                </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form> --}}
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="{{ url('penjualan/ajax') }}" method="POST" id="form-tambah">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Penjualan Beserta Detailnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Data Penjualan -->
                <div class="form-group">
                    <label>Pembeli</label>
                    <input type="text" name="pembeli" id="pembeli" class="form-control" required>
                    <small id="error-pembeli" class="error-text form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Kode Penjualan</label>
                    <input type="text" name="penjualan_kode" id="penjualan_kode" class="form-control" required>
                    <small id="error-penjualan_kode" class="error-text form-text text-danger"></small>
                </div>

                <!-- Bagian Detail Penjualan -->
                <h5>Detail Penjualan</h5>
                <table class="table" id="detailTable">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Stok Tersedia</th>
                            <th>Jumlah</th>
                            <th>Harga (Otomatis)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Baris detail akan ditambahkan secara dinamis --}}
                    </tbody>
                </table>
                <button type="button" id="addDetail" class="btn btn-info mb-3">Tambah Barang</button>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Penjualan</button>
            </div>
        </form>
    </div>
</div>

<script>
   
    $(document).ready(function () {
        // Saat user memilih barang, isi harga
        $('#barang_id').on('change', function () {
            let selected = $(this).find('option:selected');
            let harga = parseFloat(selected.data('harga')) || 0;
            let jumlah = parseFloat($('#jumlah_barang').val()) || 1;
            let total = harga * jumlah;

            $('#harga_barang').val(total);
        });

        // Saat user mengisi jumlah, update total harga juga
        $('#jumlah_barang').on('input', function () {
            let jumlah = parseFloat($(this).val()) || 1;
            let selected = $('#barang_id').find('option:selected');
            let harga = parseFloat(selected.data('harga')) || 0;
            let total = harga * jumlah;

            $('#harga_barang').val(total);
        });

        // Validasi & submit
        $("#form-tambah").validate({
            rules: {
                penjualan_id: { required: true },
                barang_id: { required: true },
                harga_barang: { required: true },
                jumlah_barang: { required: true, min: 1 }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataSupplier.ajax.reload();
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>