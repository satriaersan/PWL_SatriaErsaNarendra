<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id'   => 11,
                'kategori_id'   => '1',
                'barang_kode'  => 'A1',
                'barang_nama'   => 'kalung',
                'harga_jual'    => 25000,
                'harga_beli'    => 20000,
            ],
            [
                'barang_id'   => 22,
                'kategori_id'   => '1',
                'barang_kode'  => 'A2',
                'barang_nama'   => 'gelang',
                'harga_jual'    => 20000,
                'harga_beli'    => 15000,
            ],
            [
                'barang_id'   => 33,
                'kategori_id'   => '2',
                'barang_kode'  => 'B1',
                'barang_nama'   => 'laptop',
                'harga_jual'    => 7000000,
                'harga_beli'    => 6000000,
            ],
            [
                'barang_id'   => 44,
                'kategori_id'   => '2',
                'barang_kode'  => 'B2',
                'barang_nama'   => 'HP',
                'harga_jual'    => 2000000,
                'harga_beli'    => 1000000,
            ],
            [
                'barang_id'   => 55,
                'kategori_id'   => '3',
                'barang_kode'  => 'C1',
                'barang_nama'   => 'obat',
                'harga_jual'    => 5000,
                'harga_beli'    => 3000,
            ],
            [
                'barang_id'   => 66,
                'kategori_id'   => '3',
                'barang_kode'  => 'C2',
                'barang_nama'   => 'vitamin',
                'harga_jual'    => 3000,
                'harga_beli'    => 2000,
            ],
            [
                'barang_id'   => 77,
                'kategori_id'   => '4',
                'barang_kode'  => 'D1',
                'barang_nama'   => 'jaket',
                'harga_jual'    => 200000,
                'harga_beli'    => 100000,
            ],
            [
                'barang_id'   => 88,
                'kategori_id'   => '4',
                'barang_kode'  => 'D2',
                'barang_nama'   => 'baju',
                'harga_jual'    => 50000,
                'harga_beli'    => 40000,
            ],
            [
                'barang_id'   => 98,
                'kategori_id'   => '5',
                'barang_kode'  => 'E1',
                'barang_nama'   => 'Bola Bleter',
                'harga_jual'    => 100000,
                'harga_beli'    => 80000,
            ],
            [
                'barang_id'   => 99,
                'kategori_id'   => '5',
                'barang_kode'  => 'E2',
                'barang_nama'   => 'Bola Basket',
                'harga_jual'    => 200000,
                'harga_beli'    => 150000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
