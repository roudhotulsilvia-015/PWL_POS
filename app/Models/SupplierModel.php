<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';

    protected $fillable = ['supplier_kode', 'supplier_nama', 'supplier_alamat'];
        /**
        * Mendapatkan barang yang dimiliki oleh supplier ini (Relasi One to Many)
        */
    public function barangs()
    {
        return $this->hasMany(BarangModel::class, 'supplier_id', 'supplier_id');
    }       
}