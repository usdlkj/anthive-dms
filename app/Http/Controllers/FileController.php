<?php

namespace App\Http\Controllers;

use App\DataTables\FileDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Repositories\FileRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class FileController extends AppBaseController
{
    /** @var  FileRepository */
    private $fileRepository;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepository = $fileRepo;
    }

    /**
     * Display a listing of the File.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new FileDataTable())->get())->make(true);
        }
    
        return view('files.index');
    }

    /**
     * Show the form for creating a new File.
     *
     * @return Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created File in storage.
     *
     * @param CreateFileRequest $request
     *
     * @return Response
     */
    public function store(CreateFileRequest $request)
    {
        $input = $request->all();

        $file = $this->fileRepository->create($input);

        Flash::success('File saved successfully.');

        return redirect(route('files.index'));
    }

    /**
     * Display the specified File.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }

        return view('files.show')->with('file', $file);
    }

    /**
     * Show the form for editing the specified File.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }

        return view('files.edit')->with('file', $file);
    }

    /**
     * Update the specified File in storage.
     *
     * @param  int              $id
     * @param UpdateFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileRequest $request)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }

        $file = $this->fileRepository->update($request->all(), $id);

        Flash::success('File updated successfully.');

        return redirect(route('files.index'));
    }

    /**
     * Remove the specified File from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $file = $this->fileRepository->find($id);

        $file->delete();

        return $this->sendSuccess('File deleted successfully.');
    }
}
