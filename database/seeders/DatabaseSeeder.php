<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanySeeder::class,
            UserSeeder::class,
        ]);

        Company::factory()
                    ->count(17)
                    ->has(User::factory()->count(3))
                    ->create();
        // \App\Models\User::factory(25)->create();
    }
}
