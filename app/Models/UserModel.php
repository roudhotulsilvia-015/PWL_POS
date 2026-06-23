<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; //implementasi class Authenticatable

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    protected $hidden = ['password'];
    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Relasi ke table level
     */

    public function level(): BelongsTo
{
    // Pastikan LevelModel::class merujuk ke file yang dibuat di langkah 1
    return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
}
// Mendapatkan nama role
public function getRoleName(): string
{
    return $this->level->level_nama;
}

// Cek apakah user memiliki role tertentu
public function hasRole($role): bool
{
    return $this->level->level_kode == $role;
}
}