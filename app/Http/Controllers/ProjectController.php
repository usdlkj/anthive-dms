<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\ProjectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\ProjectField;
use Illuminate\Support\Facades\Auth;
use DataTables;
use DB;

class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('projects')
                        ->whereNull('projects.deleted_at')
                        ->join('companies', 'projects.project_owner_id', '=', 'companies.id')
                        ->select('projects.*', 'companies.company_name')
                        ->get();
            $data = json_decode(json_encode($data), true);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $action_btn = '<td><div class="btn-group">
                        <a href="/projects/'.$row['id'].'/users" class="btn btn-outline-primary btn-xs">
                            <i class="fas fa-user"></i>
                        </a>
                        <a href="/projects/'.$row['id'].'/fields" class="btn btn-outline-primary btn-xs">
                            <i class="fas fa-table"></i>
                        </a>
                        <a href="'.route('projects.show', $row['id']).'" class="btn btn-outline-secondary btn-xs">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="'.route('projects.edit', $row['id']).'" class="btn btn-outline-warning btn-xs">
                            <i class="far fa-edit"></i>
                        </a></div></td>';
                    return $action_btn;
                })
                ->addColumn('startDate', function($row) {
                    return date("d-M-Y", strtotime($row['start_date']));
                })
                ->addColumn('projectValue', function($row) {
                    $project_value = '<td class="text-right">'.number_format($row['project_value']).'</td>';
                    return $project_value;
                })
                ->rawColumns(['action', 'projectValue'])
                ->make(true);
        }

        return view('projects.index');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create')
            ->with('companies', \App\Models\Company::all());
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        // get project's detail
        $input = $request->all();

        // add project owner
        $input['project_owner_id'] = $input['project_owner'];

        // store project and get its object
        $project = $this->projectRepository->create($input);

        // add current user to the project
        $projectUser = new ProjectUser;
        $projectUser->user_id = Auth::user()->id;
        $projectUser->project_id = $project->id;
        $projectUser->save();

        // add document number field
        $docNum = new ProjectField;
        $docNum->project_id = $project->id;
        $docNum->field_code = 'docnum';
        $docNum->field_type = ProjectField::FIELD_TEXT;
        $docNum->field_text = 'Document Number';
        $docNum->visible = true;
        $docNum->mandatory = true;
        $docNum->sequence = 1;
        $docNum->save();

        // add document type field
        $docType = new ProjectField;
        $docType->project_id = $project->id;
        $docType->field_code = 'doctype';
        $docType->field_type = ProjectField::FIELD_SINGLE_SELECT;
        $docType->field_text = 'Type';
        $docType->visible = true;
        $docType->mandatory = true;
        $docType->sequence = 2;
        $docType->save();

        // add document status field
        $docStatus = new ProjectField;
        $docStatus->project_id = $project->id;
        $docStatus->field_code = 'docstatus';
        $docStatus->field_type = ProjectField::FIELD_SINGLE_SELECT;
        $docStatus->field_text = 'Status';
        $docStatus->visible = true;
        $docStatus->mandatory = true;
        $docStatus->sequence = 3;
        $docStatus->save();

        // add revision number field
        $revision = new ProjectField;
        $revision->project_id = $project->id;
        $revision->field_code = 'revision';
        $revision->field_type = ProjectField::FIELD_SHORT_TEXT;
        $revision->field_text = 'Revision';
        $revision->visible = true;
        $revision->mandatory = true;
        $revision->sequence = 4;
        $revision->save();

        // add revision date field
        $revDate = new ProjectField;
        $revDate->project_id = $project->id;
        $revDate->field_code = 'revdate';
        $revDate->field_type = ProjectField::FIELD_DATE;
        $revDate->field_text = 'Rev Date';
        $revDate->visible = true;
        $revDate->mandatory = true;
        $revDate->sequence = 5;
        $revDate->save();

        // add file field

        Flash::success('Project saved successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.edit')
            ->with('project', $project)
            ->with('companies', \App\Models\Company::all());
    }

    /**
     * Update the specified Project in storage.
     *
     * @param int $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $input = $request->all();
        $input['project_owner_id'] = $input['project_owner'];
        $project = $this->projectRepository->update($input, $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
