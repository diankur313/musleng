<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class verif extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'nama' => 'lala',
            'email' => 'verif@gmail.com',
            'uuid' => Str::uuid(),
            'id_anggota' => '1112093000005',
            'password' => bcrypt('basmalah'),
            'jenis_kelamin' => 'Pria',
            'nama_angkatan' => 'Al Ghuroba',
            'level' => 'Verifikator'
        ]);
    }
}
