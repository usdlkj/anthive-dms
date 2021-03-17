<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSelectValueRequest;
use App\Http\Requests\UpdateSelectValueRequest;
use App\Repositories\SelectValueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use DB;
use DataTables;

class SelectValueController extends AppBaseController
{
    /** @var  SelectValueRepository */
    private $selectValueRepository;

    public function __construct(SelectValueRepository $selectValueRepo)
    {
        $this->selectValueRepository = $selectValueRepo;
    }

    /**
     * Display a listing of the SelectValue.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index($projectId, $fieldId, Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('select_values')
                        ->join('project_fields', 'select_values.project_field_id', '=', 'project_fields.id')
                        ->select('select_values.*', 'project_fields.project_id', 'project_fields.field_text')
                        ->get();
            $data = json_decode(json_encode($data), true);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $action_btn = '<td><div class="btn-group">
                        <a href="/projects/'.$row['project_id'].'/fields/'.$row['project_field_id'].'/selects/'.$row['id'].'" class="btn btn-outline-secondary btn-xs">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="/projects/'.$row['project_id'].'/fields/'.$row['project_field_id'].'/selects/'.$row['id'].'/edit" class="btn btn-outline-warning btn-xs">
                            <i class="far fa-edit"></i>
                        </a></div></td>';
                    return $action_btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('select_values.index')
            ->with('projectId', $projectId)
            ->with('fieldId', $fieldId);
    }

    /**
     * Show the form for creating a new SelectValue.
     *
     * @return Response
     */
    public function create($projectId, $fieldId)
    {
        return view('select_values.create')
            ->with('projectId', $projectId)
            ->with('fieldId', $fieldId);
    }

    /**
     * Store a newly created SelectValue in storage.
     *
     * @param CreateSelectValueRequest $request
     *
     * @return Response
     */
    public function store($projectId, $fieldId, CreateSelectValueRequest $request)
    {
        $input = $request->all();
        $input['project_field_id'] = $fieldId;

        $selectValue = $this->selectValueRepository->create($input);

        Flash::success('Select Value saved successfully.');

        return redirect(route('projects.fields.selects.index', [$projectId, $fieldId]));
    }

    /**
     * Display the specified SelectValue.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($projectId, $fieldId, $id)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        return view('select_values.show')
            ->with('selectValue', $selectValue)
            ->with('projectId', $projectId)
            ->with('fieldId', $fieldId);
    }

    /**
     * Show the form for editing the specified SelectValue.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($projectId, $fieldId, $id)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        return view('select_values.edit')
            ->with('selectValue', $selectValue)
            ->with('projectId', $projectId)
            ->with('fieldId', $fieldId);
    }

    /**
     * Update the specified SelectValue in storage.
     *
     * @param int $id
     * @param UpdateSelectValueRequest $request
     *
     * @return Response
     */
    public function update($projectId, $fieldId, $id, UpdateSelectValueRequest $request)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        $selectValue = $this->selectValueRepository->update($request->all(), $id);

        Flash::success('Select Value updated successfully.');

        return redirect(route('projects.fields.selects.index', [$projectId, $fieldId]));
    }

    /**
     * Remove the specified SelectValue from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        $this->selectValueRepository->delete($id);

        Flash::success('Select Value deleted successfully.');

        return redirect(route('selectValues.index'));
    }
}
