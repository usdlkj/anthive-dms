<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectUserRequest;
use App\Http\Requests\UpdateProjectUserRequest;
use App\Repositories\ProjectUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use DB;
use DataTables;
use App\Models\ProjectUser;
use App\Models\Project;

class ProjectUserController extends AppBaseController
{
    /** @var  ProjectUserRepository */
    private $projectUserRepository;

    public function __construct(ProjectUserRepository $projectUserRepo)
    {
        $this->projectUserRepository = $projectUserRepo;
    }

    /**
     * Display a listing of the ProjectUser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request, $projectId)
    {
        if ($request->ajax()) {
            $data = DB::table('project_user')
                        ->where('project_id', '=', $projectId)
                        ->join('users', 'project_user.user_id', '=', 'users.id')
                        ->select('project_user.*', 'users.name')
                        ->get();
            $data = json_decode(json_encode($data), true);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $action_btn = '<td><div class="btn-group">
                        <form action="/projects/'.$row['project_id'].'/users/'.$row['user_id'].'" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="'.csrf_token().'">
                        <button type="submit" class="btn btn-outline-danger btn-xs">
                            <i class="fas fa-user-minus"></i>
                        </button>
                        </form></div></td>';
                    return $action_btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $project = Project::find($projectId);

        return view('project_users.index')->with('project', $project);
    }

    /**
     * Show the form for creating a new ProjectUser.
     *
     * @return Response
     */
    public function create($projectId)
    {
        $project = Project::find($projectId);
        $users = \App\Models\User::all();
        return view('project_users.create')
                ->with('project', $project)
                ->with('users', $users);
    }

    /**
     * Store a newly created ProjectUser in storage.
     *
     * @param CreateProjectUserRequest $request
     *
     * @return Response
     */
    public function store($projectId, CreateProjectUserRequest $request)
    {
        $input = $request->all();
        $input['project_id'] = $projectId;

        $projectUser = $this->projectUserRepository->create($input);

        Flash::success('Project User saved successfully.');

        return redirect(route('projects.users.index', $projectId));
    }

    /**
     * Display the specified ProjectUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($projectId, $userId)
    {
        $projectUser = ProjectUser::where('project_id', $projectId)
            ->where('user_id', $userId)
            ->first();

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projects.users.index', $projectId));
        }

        return view('project_users.show')->with('projectUser', $projectUser);
    }

    /**
     * Show the form for editing the specified ProjectUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($projectId, $userId)
    {
        $projectUser = ProjectUser::where('project_id', $projectId)
            ->where('user_id', $userId)
            ->first();

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projects.users.index', $projectId));
        }

        return view('project_users.edit')->with('projectUser', $projectUser);
    }

    /**
     * Update the specified ProjectUser in storage.
     *
     * @param int $id
     * @param UpdateProjectUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectUserRequest $request)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projects.users.index', $projectId));
        }

        $projectUser = $this->projectUserRepository->update($request->all(), $id);

        Flash::success('Project User updated successfully.');

        return redirect(route('projects.users.index', $projectId));
    }

    /**
     * Remove the specified ProjectUser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($projectId, $userId)
    {
        $projectUser = ProjectUser::where('project_id', $projectId)
                                        ->where('user_id', $userId)
                                        ->delete();

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projects.users.index', $projectId));
        }

        Flash::success('Project User deleted successfully.');

        return redirect(route('projects.users.index', $projectId));
    }
}
