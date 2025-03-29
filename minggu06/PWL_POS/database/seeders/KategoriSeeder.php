<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => '1',
                'kategori_kode' => '01',
                'kategori_nama' => 'Aksesoris',
            ],
            [
                'kategori_id' => '2',
                'kaategori_kode' => '02',
                'kategori_nama' => 'Elektronik',
            ],
            [
                'kategori_id' => '3',
                'kaategori_kode' => '03',
                'kategori_nama' => 'Kesehatan',
            ],
            [
                'kategori_id' => '4',
                'kaategori_kode' => '04',
                'kategori_nama' => 'Pakaian ',
            ],
            [
                'kategori_id' => '5',
                'kaategori_kode' => '05',
                'kategori_nama' => 'Olahraga',
            ],
        ];  

    DB::table('m_kategori')->insert($data);
    }
}
