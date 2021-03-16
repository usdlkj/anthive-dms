<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectFieldRequest;
use App\Http\Requests\UpdateProjectFieldRequest;
use App\Repositories\ProjectFieldRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\ProjectField;
use DataTables;

class ProjectFieldController extends AppBaseController
{
    /** @var  ProjectFieldRepository */
    private $projectFieldRepository;

    public function __construct(ProjectFieldRepository $projectFieldRepo)
    {
        $this->projectFieldRepository = $projectFieldRepo;
    }

    /**
     * Display a listing of the ProjectField.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request, $projectId)
    {
        if ($request->ajax()) {
            $data = ProjectField::where('project_id', $projectId)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $action_btn = '<td><div class="btn-group">
                        <a href="/projects/'.$row['project_id'].'/fields/'.$row['id'].'" class="btn btn-outline-secondary btn-xs">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="/projects/'.$row['project_id'].'/fields/'.$row['id'].'/edit" class="btn btn-outline-warning btn-xs">
                            <i class="far fa-edit"></i>
                        </a></div></td>';
                    return $action_btn;
                })
                ->addColumn('visibleText', function($row) {
                    return $row['visible'] == 1 ? 'Yes' : 'No';
                })
                ->addColumn('mandatoryText', function($row) {
                    return $row['mandatory'] == 1 ? 'Yes' : 'No';
                })
                ->addColumn('fieldTypeText', function($row) {
                    switch ($row['field_type']) {
                        case ProjectField::FIELD_SHORT_TEXT: return 'Short Text'; break;
                        case ProjectField::FIELD_TEXT: return 'Text'; break;
                        case ProjectField::FIELD_TEXT_AREA: return 'Text Area'; break;
                        case ProjectField::FIELD_DATE: return 'Date'; break;
                        case ProjectField::FIELD_SINGLE_SELECT: return 'Single Select'; break;
                        case ProjectField::FIELD_MULTI_SELECT: return 'Multi Select'; break;
                    };

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('project_fields.index')->with('projectId', $projectId);
    }

    /**
     * Show the form for creating a new ProjectField.
     *
     * @return Response
     */
    public function create($projectId)
    {
        $count = ProjectField::where('project_id', $projectId)->count();
        return view('project_fields.create')
            ->with('projectId', $projectId)
            ->with('count', $count);
    }

    /**
     * Store a newly created ProjectField in storage.
     *
     * @param CreateProjectFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectFieldRequest $request, $projectId)
    {
        $input = $request->all();
        $input['project_id'] = $projectId;

        $projectField = $this->projectFieldRepository->create($input);

        Flash::success('Project Field saved successfully.');

        return redirect('/projects/'.$projectId.'/fields');
    }

    /**
     * Display the specified ProjectField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $projectField = $this->projectFieldRepository->find($id);

        if (empty($projectField)) {
            Flash::error('Project Field not found');

            return redirect(route('projectFields.index'));
        }

        return view('project_fields.show')->with('projectField', $projectField);
    }

    /**
     * Show the form for editing the specified ProjectField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($projectId, $id)
    {
        $projectField = $this->projectFieldRepository->find($id);
        $count = ProjectField::where('project_id', $projectId)->count();

        if (empty($projectField)) {
            Flash::error('Project Field not found');

            return redirect(route('projectFields.index'));
        }

        return view('project_fields.edit')
            ->with('projectField', $projectField)
            ->with('projectId', $projectId)
            ->with('count', $count-1);
    }

    /**
     * Update the specified ProjectField in storage.
     *
     * @param int $id
     * @param UpdateProjectFieldRequest $request
     *
     * @return Response
     */
    public function update($projectId, UpdateProjectFieldRequest $request, $id)
    {
        $projectField = $this->projectFieldRepository->find($id);

        if (empty($projectField)) {
            Flash::error('Project Field not found');

            return redirect(route('projectFields.index'));
        }

        $projectField = $this->projectFieldRepository->update($request->all(), $id);

        Flash::success('Project Field updated successfully.');

        return redirect('/projects/'.$projectId.'/fields');
    }

    /**
     * Remove the specified ProjectField from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $projectField = $this->projectFieldRepository->find($id);

        if (empty($projectField)) {
            Flash::error('Project Field not found');

            return redirect(route('projectFields.index'));
        }

        $this->projectFieldRepository->delete($id);

        Flash::success('Project Field deleted successfully.');

        return redirect(route('projectFields.index'));
    }
}
