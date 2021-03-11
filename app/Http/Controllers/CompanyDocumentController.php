<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDocumentDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanyDocumentRequest;
use App\Http\Requests\UpdateCompanyDocumentRequest;
use App\Repositories\CompanyDocumentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class CompanyDocumentController extends AppBaseController
{
    /** @var  CompanyDocumentRepository */
    private $companyDocumentRepository;

    public function __construct(CompanyDocumentRepository $companyDocumentRepo)
    {
        $this->companyDocumentRepository = $companyDocumentRepo;
    }

    /**
     * Display a listing of the CompanyDocument.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new CompanyDocumentDataTable())->get())->make(true);
        }
    
        return view('company_documents.index');
    }

    /**
     * Show the form for creating a new CompanyDocument.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_documents.create');
    }

    /**
     * Store a newly created CompanyDocument in storage.
     *
     * @param CreateCompanyDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyDocumentRequest $request)
    {
        $input = $request->all();

        $companyDocument = $this->companyDocumentRepository->create($input);

        Flash::success('Company Document saved successfully.');

        return redirect(route('companyDocuments.index'));
    }

    /**
     * Display the specified CompanyDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyDocument = $this->companyDocumentRepository->find($id);

        if (empty($companyDocument)) {
            Flash::error('Company Document not found');

            return redirect(route('companyDocuments.index'));
        }

        return view('company_documents.show')->with('companyDocument', $companyDocument);
    }

    /**
     * Show the form for editing the specified CompanyDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyDocument = $this->companyDocumentRepository->find($id);

        if (empty($companyDocument)) {
            Flash::error('Company Document not found');

            return redirect(route('companyDocuments.index'));
        }

        return view('company_documents.edit')->with('companyDocument', $companyDocument);
    }

    /**
     * Update the specified CompanyDocument in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyDocumentRequest $request)
    {
        $companyDocument = $this->companyDocumentRepository->find($id);

        if (empty($companyDocument)) {
            Flash::error('Company Document not found');

            return redirect(route('companyDocuments.index'));
        }

        $companyDocument = $this->companyDocumentRepository->update($request->all(), $id);

        Flash::success('Company Document updated successfully.');

        return redirect(route('companyDocuments.index'));
    }

    /**
     * Remove the specified CompanyDocument from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyDocument = $this->companyDocumentRepository->find($id);

        $companyDocument->delete();

        return $this->sendSuccess('Company Document deleted successfully.');
    }
}
