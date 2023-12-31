<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('user')->insert([
            'nama' => 'Dian Kurniawan',
            'uuid' => Str::uuid(),
            'email' => 'dian@gmail.com',
            'id_anggota' => '1112093000004',
            'password' => bcrypt('basmalah'),
            'jenis_kelamin'=>'Pria',
            'nama_angkatan'=>'Al Ghuroba',
            'level'=>'Admin',
            'Bidang'=>'Peserta'
        ]);
    }
}
