<?php

namespace App\Http\Controllers;

use App\DataTables\SelectValueDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSelectValueRequest;
use App\Http\Requests\UpdateSelectValueRequest;
use App\Repositories\SelectValueRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class SelectValueController extends AppBaseController
{
    /** @var  SelectValueRepository */
    private $selectValueRepository;

    public function __construct(SelectValueRepository $selectValueRepo)
    {
        $this->selectValueRepository = $selectValueRepo;
    }

    /**
     * Display a listing of the SelectValue.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new SelectValueDataTable())->get())->make(true);
        }
    
        return view('select_values.index');
    }

    /**
     * Show the form for creating a new SelectValue.
     *
     * @return Response
     */
    public function create()
    {
        return view('select_values.create');
    }

    /**
     * Store a newly created SelectValue in storage.
     *
     * @param CreateSelectValueRequest $request
     *
     * @return Response
     */
    public function store(CreateSelectValueRequest $request)
    {
        $input = $request->all();

        $selectValue = $this->selectValueRepository->create($input);

        Flash::success('Select Value saved successfully.');

        return redirect(route('selectValues.index'));
    }

    /**
     * Display the specified SelectValue.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        return view('select_values.show')->with('selectValue', $selectValue);
    }

    /**
     * Show the form for editing the specified SelectValue.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        return view('select_values.edit')->with('selectValue', $selectValue);
    }

    /**
     * Update the specified SelectValue in storage.
     *
     * @param  int              $id
     * @param UpdateSelectValueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSelectValueRequest $request)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        $selectValue = $this->selectValueRepository->update($request->all(), $id);

        Flash::success('Select Value updated successfully.');

        return redirect(route('selectValues.index'));
    }

    /**
     * Remove the specified SelectValue from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $selectValue = $this->selectValueRepository->find($id);

        $selectValue->delete();

        return $this->sendSuccess('Select Value deleted successfully.');
    }
}
