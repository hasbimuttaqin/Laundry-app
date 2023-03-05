<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggans')->insert([
            'nama' => 'Wandi Rustiawan',
            'alamat' => 'Kp.Sindangsari',
            'jenis_kelamin' => 'Laki-laki',
            'no_tlp' => '083244678432'
        ]);
    }
}
