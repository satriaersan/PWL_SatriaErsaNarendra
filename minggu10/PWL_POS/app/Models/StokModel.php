<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;
    protected $table = 't_stok'; // Nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'stok_id'; // Primary key dari tabel yang digunakan

    protected $fillable = [
        'barang_id',
        'supplier_id',
        'user_id',
        'stok_tanggal_masuk',
        'stok_jumlah',
    ]; // Kolom-kolom yang dapat diisi secara massal

    public function barang(): BelongsTo {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function supplier(): BelongsTo {
        return $this->belongsTo(SupplierModel::class, 'supplier_id', 'supplier_id');
    }
}
