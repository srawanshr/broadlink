<?php

namespace App\Http\Controllers\Backend;

use File;
use Illuminate\Http\Request;
use App\Services\UploadsManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;

class UploadController extends Controller
{
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Show page of files / subfolders
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $folder = $request->get('folder');

        $data = $this->manager->folderInfo($folder);

        return view('backend.upload.index', $data);
    }

    /**
     * Create a new folder
     *
     * @param UploadNewFolderRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createFolder(UploadNewFolderRequest $request)
    {
        $new_folder = $request->get('new_folder');

        $folder = $request->get('folder') . '/' . $new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result === true) {

            return redirect()->back()->withSuccess( trans('messages.create_success', [ 'entity' => 'folder' ]) );

        } else {

            $error = $result ?: trans('messages.create_error', [ 'entity' => 'directory' ]);

            return redirect()->back()->withErrors([$error]);
        }
    }

    /**
     * Delete a folder
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');

        $folder = $request->get('folder') . '/' . $del_folder;

        $result = $this->manager->deleteDirectory($folder);

        if ($result === true) {

            return redirect()->back()->withSuccess( trans('messages.delete_success', ['entity' => 'Folder']) );

        } else {
            $error = $result ?: trans('messages.delete_error', ['entity' => 'directory']);

            return redirect()->back()->withErrors([$error]);
        }
    }

    /**
     * Upload new file
     *
     * @param UploadFileRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadFile(UploadFileRequest $request)
    {
        $file = $_FILES['file'];

        $fileName = $request->get('file_name');

        $fileName = $fileName ?: $file['name'];

        $path = str_finish($request->get('folder'), '/') . $fileName;

        $content = File::get($file['tmp_name']);

        $result = $this->manager->saveFile($path, $content);

        if ($result === true) {

            return redirect()->back()->withSuccess( trans('messages.upload_success', ['entity' => 'file']) );

        } else {
            $error = $result ?: trans('messages.upload_error', ['entity' => 'file']);

            return redirect()->back()->withErrors([$error]);
        }
    }

    /**
     * Delete a file
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');

        $path = $request->get('folder') . '/' . $del_file;

        $result = $this->manager->deleteFile($path);

        if ($result === true) {

            return redirect()->back()->withSuccess( trans('messages.delete_success', ['entity' => 'File']) );

        } else {
            $error = $result ?: trans('messages.delete_error', ['entity' => 'file']);

            return redirect()->back()->withErrors([$error]);
        }
    }
}
