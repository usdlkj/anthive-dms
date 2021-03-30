<?php

namespace App\Http\Controllers;

use App\DataTables\MailTypeDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMailTypeRequest;
use App\Http\Requests\UpdateMailTypeRequest;
use App\Repositories\MailTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

use App\Models\MailType;

class MailTypeController extends AppBaseController
{
    /** @var  MailTypeRepository */
    private $mailTypeRepository;

    public function __construct(MailTypeRepository $mailTypeRepo)
    {
        $this->mailTypeRepository = $mailTypeRepo;
    }

    /**
     * Display a listing of the MailType.
     *
     * @param Request $request
     * @return Response
     */
    public function index($projectId, Request $request)
    {
        if ($request->ajax()) {
            $data = MailType::where('project_id', $projectId);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $action_btn = '<td><div class="btn-group">
                        <a href="'.route('projects.mailTypes.show', [$row['project_id'], $row['id']]).'" class="btn btn-outline-secondary btn-xs">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="'.route('projects.mailTypes.edit', [$row['project_id'], $row['id']]).'" class="btn btn-outline-warning btn-xs">
                            <i class="far fa-edit"></i>
                        </a></div></td>';
                    return $action_btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('mail_types.index')->with('projectId', $projectId);
    }

    /**
     * Show the form for creating a new MailType.
     *
     * @return Response
     */
    public function create($projectId)
    {
        return view('mail_types.create')->with('projectId', $projectId);
    }

    /**
     * Store a newly created MailType in storage.
     *
     * @param CreateMailTypeRequest $request
     *
     * @return Response
     */
    public function store($projectId, CreateMailTypeRequest $request)
    {
        $input = $request->all();
        $input['project_id'] = $projectId;
        $input['last_mail_number'] = 0;

        $mailType = $this->mailTypeRepository->create($input);

        Flash::success('Mail Type saved successfully.');

        return redirect(route('projects.mailTypes.index', [$projectId]));
    }

    /**
     * Display the specified MailType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mailType = $this->mailTypeRepository->find($id);

        if (empty($mailType)) {
            Flash::error('Mail Type not found');

            return redirect(route('mailTypes.index'));
        }

        return view('mail_types.show')->with('mailType', $mailType);
    }

    /**
     * Show the form for editing the specified MailType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mailType = $this->mailTypeRepository->find($id);

        if (empty($mailType)) {
            Flash::error('Mail Type not found');

            return redirect(route('mailTypes.index'));
        }

        return view('mail_types.edit')->with('mailType', $mailType);
    }

    /**
     * Update the specified MailType in storage.
     *
     * @param  int              $id
     * @param UpdateMailTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMailTypeRequest $request)
    {
        $mailType = $this->mailTypeRepository->find($id);

        if (empty($mailType)) {
            Flash::error('Mail Type not found');

            return redirect(route('mailTypes.index'));
        }

        $mailType = $this->mailTypeRepository->update($request->all(), $id);

        Flash::success('Mail Type updated successfully.');

        return redirect(route('mailTypes.index'));
    }

    /**
     * Remove the specified MailType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mailType = $this->mailTypeRepository->find($id);

        $mailType->delete();

        return $this->sendSuccess('Mail Type deleted successfully.');
    }
}
