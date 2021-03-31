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

use DB;
use App\Models\Mail;
use App\Models\MailType;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

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
    public function index($projectId, Request $request)
    {
        if ($request->ajax()) {
            $mails = DB::table('mails')
                            ->where('project_id', $projectId)
                            ->whereNull('mails.deleted_at')
                            ->join('mail_types', 'mails.mail_type_id', '=', 'mail_types.id')
                            ->select('mails.*', 'mail_types.mail_type')
                            ->get();
            $data = json_decode(json_encode($mails), true);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $action_btn = '<td><div class="btn-group">
                        <a href="'.route('projects.mails.show', [$row['project_id'], $row['id']]).'" class="btn btn-outline-secondary btn-xs">
                            <i class="far fa-eye"></i>
                        </a></div></td>';
                    return $action_btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('mails.index')->with('projectId', $projectId);
    }

    /**
     * Show the form for creating a new Mail.
     *
     * @return Response
     */
    public function create($projectId)
    {
        $project = Project::find($projectId);

        return view('mails.create')
            ->with('projectId', $projectId)
            ->with('mailTypes', $project->mailTypes);
    }

    /**
     * Store a newly created Mail in storage.
     *
     * @param CreateMailRequest $request
     *
     * @return Response
     */
    public function store($projectId, CreateMailRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();

        $mailType = MailType::find($input['mail_type']);
        $newMailNumber = intval($mailType->last_mail_number) + 1;
        $strMailNumber = strval($newMailNumber);
        $strMailNumber = str_pad($strMailNumber, 5 - strlen($strMailNumber), '0', STR_PAD_LEFT);

        $input['sender_id'] = $user->id;
        $input['mail_code'] = $user->company->company_code.'-'.$mailType->mail_type_code.'-'.$strMailNumber;
        $input['mail_status'] = Mail::MAIL_STATUS_SENT;

        $mail = $this->mailRepository->create($input);

        Flash::success('Mail saved successfully.');

        return redirect(route('projects.mails.index', [$projectId]));
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
