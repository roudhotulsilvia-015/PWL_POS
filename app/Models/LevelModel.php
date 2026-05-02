<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    protected $table = 'm_level'; // Sesuaikan dengan nama tabel di database kamu
    protected $primaryKey = 'level_id';
}