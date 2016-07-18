<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\Page;
use App\Models\Image;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerUploadRequest;

class BannerController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $pages = Page::draft(false)->get();
        
        return view('backend.banner.index', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\BannerUploadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerUploadRequest $request)
    {
        $page = Page::findOrFail($request->get('page'));

        DB::transaction(function() use($request, $page) {

            $image = $request->file('banner');

            $page->banners()->create([ 'name' => cleanFileName($image) ])->upload($image);

        });

        return redirect()->back()->withSuccess( trans('messages.upload_success', [ 'entity' => 'Banner'] ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {        
        $banner = Image::find($request->get('id'));

        if($banner->delete()) {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }
}
