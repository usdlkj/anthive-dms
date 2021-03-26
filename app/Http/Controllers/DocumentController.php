<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Repositories\DocumentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Project;
use App\Models\ProjectField;
use App\Models\Document;
use App\Models\DocumentField;
use App\Models\File;
use DB;
use DataTables;

class DocumentController extends AppBaseController
{
    /** @var  DocumentRepository */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }

    /**
     * Display a listing of the Document.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index($projectId, Request $request)
    {
        if ($request->ajax()) {
            
            // get all documents for the project
            $documents = DB::table('documents')
                                ->where('project_id', $projectId)
                                ->get();
            $documents = json_decode(json_encode($documents), true);

            $data = [];

            // for each document
            foreach ($documents as $document) {

                // get its fields
                $fields = DB:: table('document_fields')
                                ->where('document_id', $document['id'])
                                ->get();

                // for each of the documents' fields
                foreach ($fields as $field) {

                    // if field is doctype
                    if ($field->field_code == 'doctype') {
                        
                        // get the doctype's select value
                        $selectValue = DB::table('select_values')->find($field->field_value);

                        // assign the value to the array
                        $temp = array(
                            $field->field_code => $selectValue->value_text
                        );
                        $document = array_merge($document, $temp);
                    }
                    else {

                        // assign the field's value to the array
                        $temp = array(
                            $field->field_code => $field->field_value
                        );
                        $document = array_merge($document, $temp);
                    }
                }

                array_push($data, $document);
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                        $action_btn = '<td><div class="btn-group">
                            <a href="'.route('projects.documents.show', [$row['project_id'], $row['id']]).'" class="btn btn-outline-secondary btn-xs">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="'.route('projects.documents.edit', [$row['project_id'], $row['id']]).'" class="btn btn-outline-warning btn-xs">
                                <i class="far fa-edit"></i>
                            </div></td>';
                        return $action_btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('documents.index')->with('projectId', $projectId);
    }

    /**
     * Show the form for creating a new Document.
     *
     * @return Response
     */
    public function create($projectId)
    {
        $projectFields = ProjectField::where('project_id', $projectId)
                                        ->orderBy('sequence')
                                        ->get();

        $selectValues = DB::table('select_values')
                            ->where('project_id', $projectId)
                            ->join('project_fields', 'select_values.project_field_id', '=', 'project_fields.id')
                            ->select('select_values.*', 'project_fields.project_id')
                            ->get();

        return view('documents.create')
            ->with('projectId', $projectId)
            ->with('projectFields', $projectFields)
            ->with('selectValues', $selectValues);
    }

    /**
     * Store a newly created Document in storage.
     *
     * @param CreateDocumentRequest $request
     *
     * @return Response
     */
    public function store($projectId, CreateDocumentRequest $request)
    {
        try {
            $input = $request->all();

            // begin transaction
            DB::beginTransaction();

            // get previous document versions
            $previousDocs = DB::table('documents')
                                ->where('project_id', $projectId)
                                ->where('document_code', $input['docnum'])
                                ->orderBy('version', 'DESC')
                                ->get();

            // create current document's object
            $currentDoc =  [
                'document_code' => $input['docnum'],
                'project_id' => $projectId,
                'file_id' => null,
                'version' => 1,
                'latest_version' => true,
                'created_date' => now(),
                'updated_date' => now()
            ];

            // if there are previous versions
            if (count($previousDocs) > 0) {
                // set version to latest 
                $currentDoc['version'] = intval($previousDocs[0]->version) + 1;

                // set previous doc's latest_version to false
                $previousDocs[0]->latest_version = false;
                $previousDocs[0]->save();
            }

            // upload file if exists
            if (isset($input['file'])) {
                $data = $request->file('file');

                $file = new File;
                $file['file_name'] = $data->getClientOriginalName();
                $file['hash_name'] = $data->hashName();
                $file['location'] = $data->store('public');
                $file['file_size'] = $data->getSize();
                $file['extension'] = $data->getClientOriginalExtension();
                $file->save();

                $currentDoc['file_id'] = $file->id;
            }

            // save current document
            $document = $this->documentRepository->create($currentDoc);

            // foreach field
            foreach($input as $key => $value) {

                // do not save '_token' and value is not empty
                if ($key != '_token' && $value != '') {
                    DocumentField::create([
                        'document_id' => $document->id,
                        'field_code' => $key,
                        'field_value' => $value,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            // commit transaction
            DB::commit();

            Flash::success('Document saved successfully.');

            return redirect(route('projects.documents.index', $projectId));
            
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();

            Flash::error('Unable to save document.');

            return redirect(route('projects.documents.index', $projectId));
        }
    }

    /**
     * Display the specified Document.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('projects.documents.index', $document->project_id));
        }

        $projectFields = ProjectField::where('project_id', $document->project_id)
                                        ->orderBy('sequence')
                                        ->get();

        $documentFields = DocumentField::where('document_id', $document->id)->get();

        $selectValues = DB::table('select_values')
                            ->where('project_id', $document->project_id)
                            ->join('project_fields', 'select_values.project_field_id', '=', 'project_fields.id')
                            ->select('select_values.*', 'project_fields.project_id')
                            ->get();

        return view('documents.show')
            ->with('document', $document)
            ->with('projectFields', $projectFields)
            ->with('documentFields', $documentFields)
            ->with('selectValues', $selectValues);
    }

    /**
     * Show the form for editing the specified Document.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('projects.documents.index', $document->project_id));
        }

        $projectFields = ProjectField::where('project_id', $document->project_id)
                                        ->orderBy('sequence')
                                        ->get();

        $documentFields = DocumentField::where('document_id', $document->id)->get();

        $selectValues = DB::table('select_values')
                            ->where('project_id', $document->project_id)
                            ->join('project_fields', 'select_values.project_field_id', '=', 'project_fields.id')
                            ->select('select_values.*', 'project_fields.project_id')
                            ->get();

        return view('documents.edit')
            ->with('document', $document)
            ->with('projectFields', $projectFields)
            ->with('documentFields', $documentFields)
            ->with('selectValues', $selectValues);
    }

    /**
     * Update the specified Document in storage.
     *
     * @param int $id
     * @param UpdateDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentRequest $request)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $document = $this->documentRepository->update($request->all(), $id);

        Flash::success('Document updated successfully.');

        return redirect(route('documents.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $this->documentRepository->delete($id);

        Flash::success('Document deleted successfully.');

        return redirect(route('documents.index'));
    }
}
