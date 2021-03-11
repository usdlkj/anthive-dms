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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new MailTypeDataTable())->get())->make(true);
        }
    
        return view('mail_types.index');
    }

    /**
     * Show the form for creating a new MailType.
     *
     * @return Response
     */
    public function create()
    {
        return view('mail_types.create');
    }

    /**
     * Store a newly created MailType in storage.
     *
     * @param CreateMailTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateMailTypeRequest $request)
    {
        $input = $request->all();

        $mailType = $this->mailTypeRepository->create($input);

        Flash::success('Mail Type saved successfully.');

        return redirect(route('mailTypes.index'));
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
