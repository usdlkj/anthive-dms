<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectFieldDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectFieldRequest;
use App\Http\Requests\UpdateProjectFieldRequest;
use App\Repositories\ProjectFieldRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

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
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new ProjectFieldDataTable())->get())->make(true);
        }
    
        return view('project_fields.index');
    }

    /**
     * Show the form for creating a new ProjectField.
     *
     * @return Response
     */
    public function create()
    {
        return view('project_fields.create');
    }

    /**
     * Store a newly created ProjectField in storage.
     *
     * @param CreateProjectFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectFieldRequest $request)
    {
        $input = $request->all();

        $projectField = $this->projectFieldRepository->create($input);

        Flash::success('Project Field saved successfully.');

        return redirect(route('projectFields.index'));
    }

    /**
     * Display the specified ProjectField.
     *
     * @param  int $id
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
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $projectField = $this->projectFieldRepository->find($id);

        if (empty($projectField)) {
            Flash::error('Project Field not found');

            return redirect(route('projectFields.index'));
        }

        return view('project_fields.edit')->with('projectField', $projectField);
    }

    /**
     * Update the specified ProjectField in storage.
     *
     * @param  int              $id
     * @param UpdateProjectFieldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectFieldRequest $request)
    {
        $projectField = $this->projectFieldRepository->find($id);

        if (empty($projectField)) {
            Flash::error('Project Field not found');

            return redirect(route('projectFields.index'));
        }

        $projectField = $this->projectFieldRepository->update($request->all(), $id);

        Flash::success('Project Field updated successfully.');

        return redirect(route('projectFields.index'));
    }

    /**
     * Remove the specified ProjectField from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $projectField = $this->projectFieldRepository->find($id);

        $projectField->delete();

        return $this->sendSuccess('Project Field deleted successfully.');
    }
}
