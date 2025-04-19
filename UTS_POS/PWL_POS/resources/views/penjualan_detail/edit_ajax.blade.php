@empty($penjualanDetail)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/penjualan_detail') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/penjualan_detail/' . $penjualanDetail->detail_id . '/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Detail Penjualan</h5>
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
                                <option value="{{ $p->penjualan_id }}" {{ $penjualanDetail->penjualan_id == $p->penjualan_id ? 'selected' : '' }}>
                                    {{ $p->penjualan_kode ?? 'ID ' . $p->penjualan_id }}
                                </option>
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
                        <input type="number" name="harga_barang" id="harga_barang" value="{{ $penjualanDetail->harga_barang }}" class="form-control" readonly required min="1">
                        <small id="error-harga_barang" class="error-text form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah_barang" id="jumlah_barang" value="{{ $penjualanDetail->jumlah_barang }}" class="form-control" required min="1">
                        <small id="error-jumlah_barang" class="error-text form-text text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $("#form-edit").validate({
                rules: {
                    penjualan_id: { required: true },
                    barang_id: { required: true },
                    harga_barang: { required: true, number: true, min: 1 },
                    jumlah_barang: { required: true, number: true, min: 1 }
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
                                dataPenjualanDetail.ajax.reload(); // ganti dengan nama DataTable kamu
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
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan saat mengirim data.'
                            });
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
            $('#barang_id').on('change', function () {
            var selected = $(this).find('option:selected');
            var harga = selected.data('harga') || 0; // default 0 kalau kosong
            $('#harga').val(harga);
            });
        });
    </script>
@endempty