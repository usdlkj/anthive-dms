<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'company_name' => 'PT Kapzet Teknologi Informasi',
            'trading_name' => 'Kapzet IT Consulting',
            'company_code' => 'KTI',
            'address' => 'Komplek Green Ville Blok BG No 69',
            'city' => 'Jakarta Barat',
            'post_code' => '11510',
            'country' => 'Indonesia',
            'phone_number' => '021 25561616',
            'email' => 'info@kapzet.id',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
