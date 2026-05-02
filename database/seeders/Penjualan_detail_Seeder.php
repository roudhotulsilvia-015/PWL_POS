<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Penjualan_detail_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
{
    $data = [];
    $counter = 1;
    for ($p = 1; $p <= 10; $p++) { // Untuk setiap penjualan
        for ($i = 1; $i <= 3; $i++) { // 3 barang per penjualan
            $data[] = [
                'detail_id' => $counter++,
                'penjualan_id' => $p,
                'barang_id' => rand(1, 15),
                'harga' => 15000, // Anda bisa menyesuaikan harga sesuai harga_jual di m_barang
                'jumlah' => rand(1, 5),
            ];
        }
    }
    DB::table('t_penjualan_detail')->insert($data);
}
    }
}
