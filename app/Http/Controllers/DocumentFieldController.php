<?php

namespace App\Http\Controllers;

use App\DataTables\DocumentFieldDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDocumentFieldRequest;
use App\Http\Requests\UpdateDocumentFieldRequest;
use App\Repositories\DocumentFieldRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class DocumentFieldController extends AppBaseController
{
    /** @var  DocumentFieldRepository */
    private $documentFieldRepository;

    public function __construct(DocumentFieldRepository $documentFieldRepo)
    {
        $this->documentFieldRepository = $documentFieldRepo;
    }

    /**
     * Display a listing of the DocumentField.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new DocumentFieldDataTable())->get())->make(true);
        }
    
        return view('document_fields.index');
    }

    /**
     * Show the form for creating a new DocumentField.
     *
     * @return Response
     */
    public function create()
    {
        return view('document_fields.create');
    }

    /**
     * Store a newly created DocumentField in storage.
     *
     * @param CreateDocumentFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentFieldRequest $request)
    {
        $input = $request->all();

        $documentField = $this->documentFieldRepository->create($input);

        Flash::success('Document Field saved successfully.');

        return redirect(route('documentFields.index'));
    }

    /**
     * Display the specified DocumentField.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentField = $this->documentFieldRepository->find($id);

        if (empty($documentField)) {
            Flash::error('Document Field not found');

            return redirect(route('documentFields.index'));
        }

        return view('document_fields.show')->with('documentField', $documentField);
    }

    /**
     * Show the form for editing the specified DocumentField.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentField = $this->documentFieldRepository->find($id);

        if (empty($documentField)) {
            Flash::error('Document Field not found');

            return redirect(route('documentFields.index'));
        }

        return view('document_fields.edit')->with('documentField', $documentField);
    }

    /**
     * Update the specified DocumentField in storage.
     *
     * @param  int              $id
     * @param UpdateDocumentFieldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentFieldRequest $request)
    {
        $documentField = $this->documentFieldRepository->find($id);

        if (empty($documentField)) {
            Flash::error('Document Field not found');

            return redirect(route('documentFields.index'));
        }

        $documentField = $this->documentFieldRepository->update($request->all(), $id);

        Flash::success('Document Field updated successfully.');

        return redirect(route('documentFields.index'));
    }

    /**
     * Remove the specified DocumentField from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentField = $this->documentFieldRepository->find($id);

        $documentField->delete();

        return $this->sendSuccess('Document Field deleted successfully.');
    }
}
