<?php

namespace App\Http\Controllers;

use App\DataTables\MailAttachmentDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMailAttachmentRequest;
use App\Http\Requests\UpdateMailAttachmentRequest;
use App\Repositories\MailAttachmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class MailAttachmentController extends AppBaseController
{
    /** @var  MailAttachmentRepository */
    private $mailAttachmentRepository;

    public function __construct(MailAttachmentRepository $mailAttachmentRepo)
    {
        $this->mailAttachmentRepository = $mailAttachmentRepo;
    }

    /**
     * Display a listing of the MailAttachment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new MailAttachmentDataTable())->get())->make(true);
        }
    
        return view('mail_attachments.index');
    }

    /**
     * Show the form for creating a new MailAttachment.
     *
     * @return Response
     */
    public function create()
    {
        return view('mail_attachments.create');
    }

    /**
     * Store a newly created MailAttachment in storage.
     *
     * @param CreateMailAttachmentRequest $request
     *
     * @return Response
     */
    public function store(CreateMailAttachmentRequest $request)
    {
        $input = $request->all();

        $mailAttachment = $this->mailAttachmentRepository->create($input);

        Flash::success('Mail Attachment saved successfully.');

        return redirect(route('mailAttachments.index'));
    }

    /**
     * Display the specified MailAttachment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mailAttachment = $this->mailAttachmentRepository->find($id);

        if (empty($mailAttachment)) {
            Flash::error('Mail Attachment not found');

            return redirect(route('mailAttachments.index'));
        }

        return view('mail_attachments.show')->with('mailAttachment', $mailAttachment);
    }

    /**
     * Show the form for editing the specified MailAttachment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mailAttachment = $this->mailAttachmentRepository->find($id);

        if (empty($mailAttachment)) {
            Flash::error('Mail Attachment not found');

            return redirect(route('mailAttachments.index'));
        }

        return view('mail_attachments.edit')->with('mailAttachment', $mailAttachment);
    }

    /**
     * Update the specified MailAttachment in storage.
     *
     * @param  int              $id
     * @param UpdateMailAttachmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMailAttachmentRequest $request)
    {
        $mailAttachment = $this->mailAttachmentRepository->find($id);

        if (empty($mailAttachment)) {
            Flash::error('Mail Attachment not found');

            return redirect(route('mailAttachments.index'));
        }

        $mailAttachment = $this->mailAttachmentRepository->update($request->all(), $id);

        Flash::success('Mail Attachment updated successfully.');

        return redirect(route('mailAttachments.index'));
    }

    /**
     * Remove the specified MailAttachment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mailAttachment = $this->mailAttachmentRepository->find($id);

        $mailAttachment->delete();

        return $this->sendSuccess('Mail Attachment deleted successfully.');
    }
}
