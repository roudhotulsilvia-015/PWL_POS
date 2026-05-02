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
{
    $data = [
        ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'B001', 'barang_nama' => 'Roti Tawar', 'harga_beli' => 10000, 'harga_jual' => 12000],
        ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'B002', 'barang_nama' => 'Susu Kotak', 'harga_beli' => 5000, 'harga_jual' => 6500],
        ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'B003', 'barang_nama' => 'Biskuit Coklat', 'harga_beli' => 7000, 'harga_jual' => 8500],
        ['barang_id' => 4, 'kategori_id' => 1, 'barang_kode' => 'B004', 'barang_nama' => 'Kripik Kentang', 'harga_beli' => 8000, 'harga_jual' => 10000],
        ['barang_id' => 5, 'kategori_id' => 1, 'barang_kode' => 'B005', 'barang_nama' => 'Mie Instan', 'harga_beli' => 2500, 'harga_jual' => 3000],
        
        ['barang_id' => 6, 'kategori_id' => 2, 'barang_kode' => 'B006', 'barang_nama' => 'Air Mineral', 'harga_beli' => 3000, 'harga_jual' => 4000],
        ['barang_id' => 7, 'kategori_id' => 2, 'barang_kode' => 'B007', 'barang_nama' => 'Teh Manis', 'harga_beli' => 4000, 'harga_jual' => 5500],
        ['barang_id' => 8, 'kategori_id' => 2, 'barang_kode' => 'B008', 'barang_nama' => 'Kopi Sachet', 'harga_beli' => 1500, 'harga_jual' => 2000],
        ['barang_id' => 9, 'kategori_id' => 2, 'barang_kode' => 'B009', 'barang_nama' => 'Jus Apel', 'harga_beli' => 12000, 'harga_jual' => 15000],
        ['barang_id' => 10, 'kategori_id' => 2, 'barang_kode' => 'B010', 'barang_nama' => 'Minuman Isotonik', 'harga_beli' => 6000, 'harga_jual' => 8000],
        
        ['barang_id' => 11, 'kategori_id' => 3, 'barang_kode' => 'B011', 'barang_nama' => 'Sabun Mandi', 'harga_beli' => 4000, 'harga_jual' => 5000],
        ['barang_id' => 12, 'kategori_id' => 3, 'barang_kode' => 'B012', 'barang_nama' => 'Shampoo', 'harga_beli' => 15000, 'harga_jual' => 18000],
        ['barang_id' => 13, 'kategori_id' => 3, 'barang_kode' => 'B013', 'barang_nama' => 'Pasta Gigi', 'harga_beli' => 10000, 'harga_jual' => 12500],
        ['barang_id' => 14, 'kategori_id' => 3, 'barang_kode' => 'B014', 'barang_nama' => 'Pencuci Muka', 'harga_beli' => 20000, 'harga_jual' => 25000],
        ['barang_id' => 15, 'kategori_id' => 3, 'barang_kode' => 'B015', 'barang_nama' => 'Hand Sanitizer', 'harga_beli' => 12000, 'harga_jual' => 15000],
    ];
    DB::table('m_barang')->insert($data);
}
    }
}
