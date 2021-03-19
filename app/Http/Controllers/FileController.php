<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Repositories\FileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use DataTables;
use App\Models\File;

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
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = File::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                        $action_btn = '<td><div class="btn-group">
                            <a href="'.\Illuminate\Support\Facades\Storage::url($row['location']).'" class="btn btn-outline-primary btn-xs">
                                <i class="fas fa-arrow-down"></i>
                            </a>
                            <form action="/files/'.$row['id'].'" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="'.csrf_token().'">
                            <button type="submit" class="btn btn-outline-danger btn-xs">
                                <i class="fas fa-trash"></i>
                            </button>
                            </form></div></td>';
                        return $action_btn;
                })
                ->addColumn('fileSize', function($row) {
                    $project_value = number_format(intval($row['file_size'])/1024^2);
                    return $project_value;
                })
                ->rawColumns(['action'])
                ->make(true);
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
        $data = $request->file('file');
        $input = [
            'file_name' => $data->getClientOriginalName(),
            'hash_name' => $data->hashName(),
            'location' => $data->store('public'),
            'file_size' => $data->getSize(),
            'extension' => $data->getClientOriginalExtension(),
        ];
        
        $file = $this->fileRepository->create($input);

        Flash::success('File saved successfully.');

        return redirect(route('files.index'));
    }

    /**
     * Display the specified File.
     *
     * @param int $id
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
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }

        $this->fileRepository->delete($id);

        Flash::success('File deleted successfully.');

        return redirect(route('files.index'));
    }
}
