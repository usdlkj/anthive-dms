<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentFieldRequest;
use App\Http\Requests\UpdateDocumentFieldRequest;
use App\Repositories\DocumentFieldRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $documentFields = $this->documentFieldRepository->all();

        return view('document_fields.index')
            ->with('documentFields', $documentFields);
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentField = $this->documentFieldRepository->find($id);

        if (empty($documentField)) {
            Flash::error('Document Field not found');

            return redirect(route('documentFields.index'));
        }

        $this->documentFieldRepository->delete($id);

        Flash::success('Document Field deleted successfully.');

        return redirect(route('documentFields.index'));
    }
}
