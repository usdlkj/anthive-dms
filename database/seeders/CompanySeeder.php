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
            'company_code' => 'KAP',
        ]);
    }
}
