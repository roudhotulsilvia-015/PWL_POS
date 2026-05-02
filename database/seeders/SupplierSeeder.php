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
        $data = [
    ['supplier_id' => 1, 'supplier_kode' => 'SJP', 'supplier_nama' => 'Sejahtera Jaya PT'],
    ['supplier_id' => 2, 'supplier_kode' => 'AMN', 'supplier_nama' => 'Amanah Makmur Nusantara'],
    ['supplier_id' => 3, 'supplier_kode' => 'GSA', 'supplier_nama' => 'Global Sumber Abadi'],
];
DB::table('m_supplier')->insert($data);
    }
}
