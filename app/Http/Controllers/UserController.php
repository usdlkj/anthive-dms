<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\User;
use DB;
use DataTables;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request, $companyId)
    {
        if ($request->ajax()) {
            $data = User::where('company_id', $companyId)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $action_btn = '<td><div class="btn-group">
                        <a href="/companies/'.$row['company_id'].'/users/'.$row['id'].'" class="btn btn-secondary btn-xs">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="/companies/'.$row['company_id'].'/users/'.$row['id'].'/edit" class="btn btn-warning btn-xs">
                            <i class="far fa-edit"></i>
                        </a></div></td>';
                    return $action_btn;
                })
                ->addColumn('roleText', function($row) {
                    switch ($row['role'])
                    {
                        case User::ROLE_SUPER_ADMIN: return 'Super Admin'; break;
                        case User::ROLE_OPS_ADMIN: return 'Ops Admin'; break;
                        case User::ROLE_COMPANY_ADMIN: return 'Company Admin'; break;
                        case User::ROLE_MANAGER: return 'Manager'; break;
                        default: return 'Staff'; break;
                    }
                })
                ->rawColumns(['action', 'roleText'])
                ->make(true);
        }

        return view('users.index')->with('companyId', $companyId);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create($companyId)
    {
        return view('users.create')->with('companyId', $companyId);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request, $companyId)
    {
        $input = $request->all();
        $input['password'] = \Illuminate\Support\Facades\Hash::make('AbCd1234EfGh5678');
        $input['company_id'] = $companyId;

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect('/companies/'.$companyId.'/users');
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($companyId, $id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($companyId, $id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($companyId, UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect('/companies/'.$companyId.'/users');
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect('/companies/'.$companyId.'/users');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($companyId, $id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect('/companies/'.$companyId.'/users');
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect('/companies/'.$companyId.'/users');
    }
}