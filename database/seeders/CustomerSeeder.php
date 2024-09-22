<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            'nama_customer' => 'Asep',
            'usia' => '23',
            'no_telepon' => '085271556364',
            'alamat' => 'Kulim City',
            'username' => 'asep123',
            'password' => Hash::make('123456'), // Password terenkripsi
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
