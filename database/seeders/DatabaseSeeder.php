<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\LevelModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed data level terlebih dahulu
        LevelModel::create([
            'level_id' => 1,
            'level_kode' => 'ADM',
            'level_nama' => 'Administrator',
        ]);

        LevelModel::create([
            'level_id' => 2,
            'level_kode' => 'USR',
            'level_nama' => 'User',
        ]);

        // Seed data user untuk test login
        UserModel::create([
            'level_id' => 1,
            'username' => 'admin',
            'nama' => 'Administrator',
            'password' => bcrypt('admin123'),
        ]);

        UserModel::create([
            'level_id' => 2,
            'username' => 'user',
            'nama' => 'User',
            'password' => bcrypt('user123'),
        ]);
    }
}
