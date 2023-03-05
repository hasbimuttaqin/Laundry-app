<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outlets')->insert([
            'nama_outlet' => 'Legit Laundry',
            'alamat' => 'Kp.Singarasa',
            'no_telp' => '084376458732'
        ]);
    }
}
