<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;
use App\Models\Project;

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
            ProjectSeeder::class
        ]);

        $project = Project::find(1);

        Company::factory()
                    ->count(5)
                    ->has(User::factory()
                                ->count(5)
                                ->hasAttached($project))
                    ->create();
    }
}
