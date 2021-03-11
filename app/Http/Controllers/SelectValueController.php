<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSelectValueRequest;
use App\Http\Requests\UpdateSelectValueRequest;
use App\Repositories\SelectValueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $selectValues = $this->selectValueRepository->all();

        return view('select_values.index')
            ->with('selectValues', $selectValues);
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $selectValue = $this->selectValueRepository->find($id);

        if (empty($selectValue)) {
            Flash::error('Select Value not found');

            return redirect(route('selectValues.index'));
        }

        $this->selectValueRepository->delete($id);

        Flash::success('Select Value deleted successfully.');

        return redirect(route('selectValues.index'));
    }
}
