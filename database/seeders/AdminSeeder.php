<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'nama_lengkap' => 'Administrator',
            'no_hp' => '081234567890',
            'role' => 'admin'
        ]);
    }
}
