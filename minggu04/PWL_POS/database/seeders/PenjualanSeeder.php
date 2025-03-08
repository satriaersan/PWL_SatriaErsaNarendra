<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id'           => 1,
                'user_id'           => '3',
                'pembeli'    => 'Bramantyo',
                'penjualan_kode' => 'a01',
                'tanggal_penjualan' => '2025-01-12 03:30:30',
            ],
            [
                'penjualan_id'           => 2,
                'user_id'           => '3',
                'pembeli'    => 'Sabilillah',
                'penjualan_kode' => 'a02',
                'tanggal_penjualan' => '2025-01-13 09:20:20',
            ],
            [
                'penjualan_id'           => 3,
                'user_id'           => '3',
                'pembeli'    => 'Narendra',
                'penjualan_kode' => 'a03',
                'tanggal_penjualan' => '2025-01-13 12:30:30',
            ],
            [
                'penjualan_id'           => 4,
                'user_id'           => '3',
                'pembeli'    => 'Bayu',
                'penjualan_kode' => 'ao4',
                'tanggal_penjualan' => '2025-01-13 18:10:10',
            ],
            [
                'penjualan_id'           => 5,
                'user_id'           => '3',
                'pembeli'    => 'Malih',
                'penjualan_kode' => 'ao5',
                'tanggal_penjualan' => '2025-01-14 13:20:21',
            ],
            [
                'penjualan_id'           => 6,
                'user_id'           => '3',
                'pembeli'    => 'Jasmine',
                'penjualan_kode' => 'ao6',
                'tanggal_penjualan' => '2025-01-14 22:30:30',
            ],
            [
                'penjualan_id'           => 7,
                'user_id'           => '3',
                'pembeli'    => 'Alex',
                'penjualan_kode' => 'ao7',
                'tanggal_penjualan' => '2025-01-15 03:30:30',
            ],
            [
                'penjualan_id'           => 8,
                'user_id'           => '3',
                'pembeli'    => 'Thasya',
                'penjualan_kode' => 'ao8',
                'tanggal_penjualan' => '2025-01-15 16:10:30',
            ],
            [
                'penjualan_id'           => 9,
                'user_id'           => '3',
                'pembeli'    => 'SIdiq',
                'penjualan_kode' => 'ao9',
                'tanggal_penjualan' => '2025-01-16 08:30:30',
            ],
            [
                'penjualan_id'           => 10,
                'user_id'           => '3',
                'pembeli'    => 'lerpi',
                'penjualan_kode' => 'ao10',
                'tanggal_penjualan' => '2025-01-17 03:30:30',
            ],
        ];

    DB::table('t_penjualan')->insert($data);
    }
    }
