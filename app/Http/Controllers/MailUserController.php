<?php

namespace App\Http\Controllers;

use App\DataTables\MailUserDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMailUserRequest;
use App\Http\Requests\UpdateMailUserRequest;
use App\Repositories\MailUserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class MailUserController extends AppBaseController
{
    /** @var  MailUserRepository */
    private $mailUserRepository;

    public function __construct(MailUserRepository $mailUserRepo)
    {
        $this->mailUserRepository = $mailUserRepo;
    }

    /**
     * Display a listing of the MailUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new MailUserDataTable())->get())->make(true);
        }
    
        return view('mail_users.index');
    }

    /**
     * Show the form for creating a new MailUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('mail_users.create');
    }

    /**
     * Store a newly created MailUser in storage.
     *
     * @param CreateMailUserRequest $request
     *
     * @return Response
     */
    public function store(CreateMailUserRequest $request)
    {
        $input = $request->all();

        $mailUser = $this->mailUserRepository->create($input);

        Flash::success('Mail User saved successfully.');

        return redirect(route('mailUsers.index'));
    }

    /**
     * Display the specified MailUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mailUser = $this->mailUserRepository->find($id);

        if (empty($mailUser)) {
            Flash::error('Mail User not found');

            return redirect(route('mailUsers.index'));
        }

        return view('mail_users.show')->with('mailUser', $mailUser);
    }

    /**
     * Show the form for editing the specified MailUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mailUser = $this->mailUserRepository->find($id);

        if (empty($mailUser)) {
            Flash::error('Mail User not found');

            return redirect(route('mailUsers.index'));
        }

        return view('mail_users.edit')->with('mailUser', $mailUser);
    }

    /**
     * Update the specified MailUser in storage.
     *
     * @param  int              $id
     * @param UpdateMailUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMailUserRequest $request)
    {
        $mailUser = $this->mailUserRepository->find($id);

        if (empty($mailUser)) {
            Flash::error('Mail User not found');

            return redirect(route('mailUsers.index'));
        }

        $mailUser = $this->mailUserRepository->update($request->all(), $id);

        Flash::success('Mail User updated successfully.');

        return redirect(route('mailUsers.index'));
    }

    /**
     * Remove the specified MailUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mailUser = $this->mailUserRepository->find($id);

        $mailUser->delete();

        return $this->sendSuccess('Mail User deleted successfully.');
    }
}
