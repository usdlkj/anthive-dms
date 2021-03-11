<?php

namespace App\Http\Controllers;

use App\DataTables\MailDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMailRequest;
use App\Http\Requests\UpdateMailRequest;
use App\Repositories\MailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class MailController extends AppBaseController
{
    /** @var  MailRepository */
    private $mailRepository;

    public function __construct(MailRepository $mailRepo)
    {
        $this->mailRepository = $mailRepo;
    }

    /**
     * Display a listing of the Mail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new MailDataTable())->get())->make(true);
        }
    
        return view('mails.index');
    }

    /**
     * Show the form for creating a new Mail.
     *
     * @return Response
     */
    public function create()
    {
        return view('mails.create');
    }

    /**
     * Store a newly created Mail in storage.
     *
     * @param CreateMailRequest $request
     *
     * @return Response
     */
    public function store(CreateMailRequest $request)
    {
        $input = $request->all();

        $mail = $this->mailRepository->create($input);

        Flash::success('Mail saved successfully.');

        return redirect(route('mails.index'));
    }

    /**
     * Display the specified Mail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error('Mail not found');

            return redirect(route('mails.index'));
        }

        return view('mails.show')->with('mail', $mail);
    }

    /**
     * Show the form for editing the specified Mail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error('Mail not found');

            return redirect(route('mails.index'));
        }

        return view('mails.edit')->with('mail', $mail);
    }

    /**
     * Update the specified Mail in storage.
     *
     * @param  int              $id
     * @param UpdateMailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMailRequest $request)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error('Mail not found');

            return redirect(route('mails.index'));
        }

        $mail = $this->mailRepository->update($request->all(), $id);

        Flash::success('Mail updated successfully.');

        return redirect(route('mails.index'));
    }

    /**
     * Remove the specified Mail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mail = $this->mailRepository->find($id);

        $mail->delete();

        return $this->sendSuccess('Mail deleted successfully.');
    }
}
