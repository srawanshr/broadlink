<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use DB;
use App\Models\Page;
use App\Models\Image;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerUploadRequest;

class BannerController extends Controller {

    /**
     * @return mixed
     */
    public function index()
    {
        $pages = Page::draft(false)->get();

        $services = Service::active(true)->get();

        return view('backend.banner.index', compact('pages', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\BannerUploadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerUploadRequest $request)
    {
        $model = $this->getRequiredModel($request);

        if ( ! $model) return redirect()->back()->withError(trans('messages.upload_error'));

        DB::transaction(function () use ($request, $model)
        {
            $image = $request->file('banner');

            $model->banners()->create(['name' => cleanFileName($image)])->upload($image);

        });

        return redirect()->back()->withSuccess(trans('messages.upload_success', ['entity' => 'Banner']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Image $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $banner)
    {
        if ($banner->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

    /**
     * @param BannerUploadRequest $request
     * @return mixed
     */
    public function getRequiredModel(BannerUploadRequest $request)
    {
        if ($request->has('page'))
        {
            $model = Page::findOrFail($request->get('page'));
        } elseif ($request->has('service'))
        {
            $model = Service::findOrFail($request->get('service'));
        } else
        {
            return false;
        }

        return $model;
    }
}
