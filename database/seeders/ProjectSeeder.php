<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectUser;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project;
        $project['project_name'] = 'Stadion BMW';
        $project['project_code'] = 'BMW';
        $project['description'] = 'Stadion sepakbola baru di Ancol, Jakarta pengganti stadion Lebak Bulus';
        $project['location'] = 'Ancol';
        $project['city'] = 'Jakarta Utara';
        $project['country'] = 'Indonesia';
        $project['project_value'] = 1000000000;
        $project['start_date'] = now();
        $project['project_owner_id'] = 1;
        $project['created_at'] = now();
        $project['updated_at'] = now();
        $project->save();

        $user = new ProjectUser;
        $user['project_id'] = $project->id;
        $user['user_id'] = 1;
        $user['created_at'] = now();
        $user['updated_at'] = now();
        $user->save();
    }
}
