<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\ProjectField;

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

        $this->createField($project->id, 'docnum', ProjectField::FIELD_TEXT, 'Document Number', true, true, 1);
        $this->createField($project->id, 'doctype', ProjectField::FIELD_SINGLE_SELECT, 'Document Type', true, true, 2);
        $this->createField($project->id, 'revision', ProjectField::FIELD_SHORT_TEXT, 'Revision', true, true, 3);
        $this->createField($project->id, 'revdate', ProjectField::FIELD_DATE, 'Revision Date', true, true, 4);
        $this->createField($project->id, 'docstatus', ProjectField::FIELD_SINGLE_SELECT, 'Document Status', true, true, 5);
        $this->createField($project->id, 'descr', ProjectField::FIELD_TEXT_AREA, 'Description', true, false, 7);
        $this->createField($project->id, 'disc', ProjectField::FIELD_MULTI_SELECT, 'Discipline', true, false, 7);
    }

    protected function createField($projectId, $fieldCode, $fieldType, $fieldText, $visible, $mandatory, $sequence)
    {
        $field = new ProjectField;
        $field['project_id'] = $projectId;
        $field['field_code'] = $fieldCode;
        $field['field_type'] = $fieldType;
        $field['field_text'] = $fieldText;
        $field['visible'] = $visible;
        $field['mandatory'] = $mandatory;
        $field['sequence'] = $sequence;
        $field['created_at'] = now();
        $field['updated_at'] = now();
        $field->save();
    }
}
