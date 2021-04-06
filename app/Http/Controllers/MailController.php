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
use App\Models\MailUser;
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
                            ->select('mails.*', 'mail_types.mail_type', 'mail_types.project_id')
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
    
        return view('mails.index')
            ->with('projectId', $projectId)
            ->with('request', $request);
    }

    /**
     * Get all mails sent to the current user
     * 
     * @return Response
     */
    public function inbox($projectId, Request $request)
    {
        if ($request->ajax()) {
            $mails = DB::table('mails')
                            ->where('project_id', $projectId)
                            ->whereNull('mails.deleted_at')
                            ->where('user_id', Auth::user()->id)
                            ->where('mail_status', Mail::MAIL_STATUS_SENT)
                            ->join('mail_types', 'mails.mail_type_id', '=', 'mail_types.id')
                            ->join('mail_user', 'mails.id', '=', 'mail_user.mail_id')
                            ->select('mails.*', 'mail_types.mail_type', 'mail_types.project_id', 'mail_user.user_id')
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
    
        return view('mails.index')
            ->with('projectId', $projectId)
            ->with('request', $request);
    }

    /**
     * Get all mails that the current user has sent
     * 
     * @return Response
     */
    public function sent($projectId, Request $request)
    {
        if ($request->ajax()) {
            $mails = DB::table('mails')
                            ->where('project_id', $projectId)
                            ->whereNull('mails.deleted_at')
                            ->where('sender_id', Auth::user()->id)
                            ->where('mail_status', Mail::MAIL_STATUS_SENT)
                            ->join('mail_types', 'mails.mail_type_id', '=', 'mail_types.id')
                            ->select('mails.*', 'mail_types.mail_type', 'mail_types.project_id')
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
    
        return view('mails.index')
            ->with('projectId', $projectId)
            ->with('request', $request);
    }

    /**
     * Get all mails that the current user is drafting
     * 
     * @return Response
     */
    public function draft($projectId, Request $request)
    {
        if ($request->ajax()) {
            $mails = DB::table('mails')
                            ->where('project_id', $projectId)
                            ->whereNull('mails.deleted_at')
                            ->where('sender_id', Auth::user()->id)
                            ->where('mail_status', Mail::MAIL_STATUS_DRAFT)
                            ->join('mail_types', 'mails.mail_type_id', '=', 'mail_types.id')
                            ->select('mails.*', 'mail_types.mail_type', 'mail_types.project_id')
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
    
        return view('mails.index')
            ->with('projectId', $projectId)
            ->with('request', $request);
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
            ->with('projectUsers', $project->users)
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
        try {
            $user = Auth::user();
            $input = $request->all();

            // begin transaction
            DB::beginTransaction();

            $mailType = MailType::find($input['mail_type']);
            $newMailNumber = intval($mailType->last_mail_number) + 1;
            $strMailNumber = strval($newMailNumber);
            $strMailNumber = str_pad($strMailNumber, 5 - strlen($strMailNumber), '0', STR_PAD_LEFT);

            $input['sender_id'] = $user->id;
            $input['mail_type_id'] = $input['mail_type'];
            $input['mail_code'] = $user->company->company_code.'-'.$mailType->mail_type_code.'-'.$strMailNumber;
            $input['mail_status'] = Mail::MAIL_STATUS_SENT;

            $mail = $this->mailRepository->create($input);

            foreach ($input['recipient_to'] as $recipientTo) {
                $mailUser = new MailUser;
                $mailUser->mail_id = $mail->id;
                $mailUser->user_id = $recipientTo;
                $mailUser->recipient_type = Mail::MAIL_RECIPIENT_TO;
                $mailUser->save();
            }

            // commit transaction
            DB::commit();

            Flash::success('Mail saved successfully.');

            return redirect(route('projects.mails.index', [$projectId]));
        }
        catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();

            Flash::error('Unable to save document.');

            return redirect(route('projects.mails.index', [$projectId]));
        }
    }

    /**
     * Display the specified Mail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($projectId, $id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error('Mail not found');

            return redirect(route('projects.mails.index', [$projectId]));
        }

        return view('mails.show')
            ->with('mail', $mail)
            ->with('projectId', $projectId);
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
