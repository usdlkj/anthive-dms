<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectUserRequest;
use App\Http\Requests\UpdateProjectUserRequest;
use App\Repositories\ProjectUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
    public function index(Request $request)
    {
        $projectUsers = $this->projectUserRepository->all();

        return view('project_users.index')
            ->with('projectUsers', $projectUsers);
    }

    /**
     * Show the form for creating a new ProjectUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('project_users.create');
    }

    /**
     * Store a newly created ProjectUser in storage.
     *
     * @param CreateProjectUserRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectUserRequest $request)
    {
        $input = $request->all();

        $projectUser = $this->projectUserRepository->create($input);

        Flash::success('Project User saved successfully.');

        return redirect(route('projectUsers.index'));
    }

    /**
     * Display the specified ProjectUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projectUsers.index'));
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
    public function edit($id)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projectUsers.index'));
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

            return redirect(route('projectUsers.index'));
        }

        $projectUser = $this->projectUserRepository->update($request->all(), $id);

        Flash::success('Project User updated successfully.');

        return redirect(route('projectUsers.index'));
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
    public function destroy($id)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projectUsers.index'));
        }

        $this->projectUserRepository->delete($id);

        Flash::success('Project User deleted successfully.');

        return redirect(route('projectUsers.index'));
    }
}
