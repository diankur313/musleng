<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Peserta extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'nama' => 'Fulan',
            'uuid' => Str::uuid(),
            'id_anggota' => '12345',
            'email' => 'peserta@gmail.com',
            'password' => bcrypt('basmalah'),
            'jenis_kelamin' => 'Pria',
            'nama_angkatan' => 'Al Ghuroba',
            'level' => 'Peserta'
        ]);
    }
}
