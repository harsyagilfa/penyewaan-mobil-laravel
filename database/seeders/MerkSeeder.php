<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merk')->insert([
            ['nama_merk' => 'Toyota'],
            ['nama_merk' => 'Honda'],
            ['nama_merk' => 'Hyundai'],
            ['nama_merk' => 'Mitsubisi'],
            ['nama_merk' => 'Daihatsu'],
        ]);
    }
}
