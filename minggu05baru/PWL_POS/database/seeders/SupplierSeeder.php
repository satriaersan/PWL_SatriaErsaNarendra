<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            ['supplier_kode' => 'A1', 'supplier_nama' => 'Supplier A', 'supplier_alamat' => 'Suhat'],
            ['supplier_kode' => 'B2', 'supplier_nama' => 'Supplier B', 'supplier_alamat' => 'Dinoyo'],
            ['supplier_kode' => 'C3', 'supplier_nama' => 'Supplier C', 'supplier_alamat' => 'Muharto'],
        ]); 
    }
}
