<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outletA = Outlet::where('nama_outlet', 'Legit Lundry')->first();

        DB::table('pakets')->insert([
            'id_outlet' => Outlet::all()->random()->id,
            'nama_paket' => 'Kintakun',
            'jenis' => 'selimut',
            'harga' => '6000'
        ]);
    }
}
