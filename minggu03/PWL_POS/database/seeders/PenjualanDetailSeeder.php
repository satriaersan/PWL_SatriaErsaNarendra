<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //  Penjualan 1
            [
                'detail_id'  => 1,
                'penjualan_id'     => 1,
                'barang_id'         => 11,
                'jumlah_barang'        => 2,
                'harga_barang'        => 50000,
            ],
            [
                'detail_id'  => 2,
                'penjualan_id'     => 1,
                'barang_id'         => 22,
                'jumlah_barang'        => 1,
                'harga_barang'        => 20000,
            ],
            [
                'detail_id'  => 3,
                'penjualan_id'     => 1,
                'barang_id'         => 66,
                'jumlah_barang'        => 2,
                'harga_barang'        => 6000,
            ],

            //  Penjualan 2
            [
                'detail_id'  => 4,
                'penjualan_id'     => 2,
                'barang_id'         => 11,
                'jumlah_barang'        => 2,
                'harga_barang'        => 50000,
            ],
            [
                'detail_id'  => 5,
                'penjualan_id'     => 2,
                'barang_id'         => 33,
                'jumlah_barang'        => 1,
                'harga_barang'        => 7000000,
            ],
            [
                'detail_id'  => 6,
                'penjualan_id'     => 2,
                'barang_id'         => 88,
                'jumlah_barang'        => 2,
                'harga_barang'        => 100000,
            ],

            //  Penjualan 3
            [
                'detail_id'  => 7,
                'penjualan_id'     => 3,
                'barang_id'         => 11,
                'jumlah_barang'        => 2,
                'harga_barang'        => 50000,
            ],
            [
                'detail_id'  => 8,
                'penjualan_id'     => 3,
                'barang_id'         => 55,
                'jumlah_barang'        => 1,
                'harga_barang'        => 5000,
            ],
            [
                'detail_id'  => 9,
                'penjualan_id'     => 3,
                'barang_id'         => 11,
                'jumlah_barang'        => 1,
                'harga_barang'        => 25000,
            ],

            //  Penjualan 4
            [
               'detail_id'  => 10,
                'penjualan_id'     => 4,
                'barang_id'         => 11,
                'jumlah_barang'        => 2,
                'harga_barang'        => 50000,
            ],
            [
                'detail_id'  => 11,
                'penjualan_id'     => 4,
                'barang_id'         => 55,
                'jumlah_barang'        => 2,
                'harga_barang'        => 10000,
            ],
            [
                'detail_id'  => 12,
                'penjualan_id'     => 4,
                'barang_id'         => 11,
                'jumlah_barang'        => 2,
                'harga_barang'        => 50000,
            ],
            //  Penjualan 5
            [
                'detail_id'  => 13,
                'penjualan_id'     => 5,
                'barang_id'         => 55,
                'jumlah_barang'        => 2,
                'harga_barang'        => 10000,
            ],
            [
                'detail_id'  => 14,
                'penjualan_id'     => 5,
                'barang_id'         => 98,
                'jumlah_barang'        => 1,
                'harga_barang'        => 100000,
            ],
            [
                'detail_id'  => 15,
                'penjualan_id'     => 5,
                'barang_id'         => 66,
                'jumlah_barang'        => 2,
                'harga_barang'        => 6000,
            ],

            //  Penjualan 6
            [
                'detail_id'  => 16,
                'penjualan_id'     => 6,
                'barang_id'         => 88,
                'jumlah_barang'        => 2,
                'harga_barang'        => 100000,
            ],
            [
                'detail_id'  => 17,
                'penjualan_id'     => 6,
                'barang_id'         => 11,
                'jumlah_barang'        => 2,
                'harga_barang'        => 50000,
            ],
            [
                'detail_id'  => 18,
                'penjualan_id'     => 6,
                'barang_id'         => 22,
                'jumlah_barang'        => 2,
                'harga_barang'        => 40000,
            ],

            //  Penjualan 7
            [
                'detail_id'  => 19,
                'penjualan_id'     => 7,
                'barang_id'         => 77,
                'jumlah_barang'        => 1,
                'harga_barang'        => 200000,
            ],
            [
                'detail_id'  => 20,
                'penjualan_id'     => 7,
                'barang_id'         => 88,
                'jumlah_barang'        => 2,
                'harga_barang'        => 100000,
            ],
            [
                'detail_id'  => 21,
                'penjualan_id'     => 7,
                'barang_id'         => 44,
                'jumlah_barang'        => 1,
                'harga_barang'        => 2000000,
            ],

            //  Penjualan 8
            [
                'detail_id'  => 22,
                'penjualan_id'     => 8,
                'barang_id'         => 98,
                'jumlah_barang'        => 2,
                'harga_barang'        => 200000,
            ],
            [
                'detail_id'  => 23,
                'penjualan_id'     => 8,
                'barang_id'         => 66,
                'jumlah_barang'        => 1,
                'harga_barang'        => 3000,
            ],
            [
                'detail_id'  => 24,
                'penjualan_id'     => 8,
                'barang_id'         => 88,
                'jumlah_barang'        => 1,
                'harga_barang'        => 50000,
            ],

            //  Penjualan 9
            [
                'detail_id'  => 25,
                'penjualan_id'     => 9,
                'barang_id'         => 55,
                'jumlah_barang'        => 3,
                'harga_barang'        => 15000,
            ],
            [
                'detail_id'  => 26,
                'penjualan_id'     => 9,
                'barang_id'         => 33,
                'jumlah_barang'        => 1,
                'harga_barang'        => 7000000,
            ],
            [
                'detail_id'  => 27,
                'penjualan_id'     => 9,
                'barang_id'         => 88,
                'jumlah_barang'        => 3,
                'harga_barang'        => 150000,
            ],

            //  Penjualan 10
            [
                'detail_id'  => 28,
                'penjualan_id'     => 10,
                'barang_id'         => 55,
                'jumlah_barang'        => 2,
                'harga_barang'        => 10000,
            ],
            [
                'detail_id'  => 29,
                'penjualan_id'     => 10,
                'barang_id'         => 66,
                'jumlah_barang'        => 2,
                'harga_barang'        => 6000,
            ],
            [
                'detail_id'  => 30,
                'penjualan_id'     => 10,
                'barang_id'         => 99,
                'jumlah_barang'        => 2,
                'harga_barang'        => 400000,
            ],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
