<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id'          => 1,
                'supplier_id'   => 1,
                'barang_id'            => 11,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 20,
            ],
            [
                'stok_id'          => 2,
                'supplier_id'   => 1,
                'barang_id'            => 22,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 15,
            ],
            [
                'stok_id'          => 3,
                'supplier_id'   => 1,
                'barang_id'            => 33,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 20,
            ],
            [
                'stok_id'          => 4,
                'supplier_id'   => 1,
                'barang_id'            => 44,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 30,
            ],
            [
                'stok_id'          => 5,
                'supplier_id'   => 1,
                'barang_id'            => 55,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 15,
            ],
            [
                'stok_id'          => 6,
                'supplier_id'   => 1,
                'barang_id'            => 66,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 20,
            ],
            [
                'stok_id'          => 7,
                'supplier_id'   => 1,
                'barang_id'            => 77,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 30,
            ],
            [
                'stok_id'          => 8,
                'supplier_id'   => 1,
                'barang_id'            => 88,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 20,
            ],
            [
                'stok_id'          => 9,
                'supplier_id'   => 1,
                'barang_id'            => 98,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 30,
            ],
            [
                'stok_id'          => 10,
                'supplier_id'   => 1,
                'barang_id'            => 99,
                'user_id'       => 1,
                'stok_tanggal_masuk'        => now(),
                'stok_jumlah'      => 20,
            ],
        ];

        DB::table('t_stok')->insert($data);
    }
}
