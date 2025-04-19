<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
    use HasFactory;
    protected $table = 't_penjualan_detail'; // Nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'detail_id'; // Primary key dari tabel yang digunakan
    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'jumlah_barang',
        'harga_barang',
    ]; // Kolom-kolom yang dapat diisi secara massal

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    public function penjualan()
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }
}
