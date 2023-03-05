<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama'=> 'Nazib',
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'nama' => 'Elsa',
            'username' => 'kasir',
            'role' => 'kasir',
            'password' => Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'nama' => 'Dani',
            'username' => 'owner',
            'role' => 'owner',
            'password' => Hash::make('123456')
        ]);
    }
}
