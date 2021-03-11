<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMailAttachmentRequest;
use App\Http\Requests\UpdateMailAttachmentRequest;
use App\Repositories\MailAttachmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mailAttachments = $this->mailAttachmentRepository->all();

        return view('mail_attachments.index')
            ->with('mailAttachments', $mailAttachments);
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mailAttachment = $this->mailAttachmentRepository->find($id);

        if (empty($mailAttachment)) {
            Flash::error('Mail Attachment not found');

            return redirect(route('mailAttachments.index'));
        }

        $this->mailAttachmentRepository->delete($id);

        Flash::success('Mail Attachment deleted successfully.');

        return redirect(route('mailAttachments.index'));
    }
}
