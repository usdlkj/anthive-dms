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
            'company_id' => 1,
            'name' => 'Super Admin',
            'email' => 'anthive@kapzet.id',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'address' => 'Komplek Green Ville Blok BG No 69',
            'city' => 'Jakarta Barat',
            'country' => 'Indonesia',
            'phone_number' => '021 25561616',
            'position' => 'Super Admin',
            'role' => 1,
            'company_id' => 1
        ]);
    }
}
