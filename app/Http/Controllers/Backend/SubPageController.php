<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\SubPageCreateRequest;
use App\Http\Requests\SubPageUpdateRequest;
use App\Models\Page;
use App\Http\Requests;
use App\Models\SubPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubPageController extends Controller {

    /**
     * @param Page $page
     * @return mixed
     */
    public function create(Page $page)
    {
        return view('backend.page.sub.create', compact('page'));
    }

    /**
     * @param Page $page
     * @param SubPageCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Page $page, SubPageCreateRequest $request)
    {
        $subPage = SubPage::create($request->subPageFillData($page->id));

        return redirect()
            ->route('admin::page.sub.edit', $page->slug, $subPage->slug)
            ->with('success', trans('messages.create_success', ['entity' => 'Sub Page']));
    }

    /**
     * @param Page $page
     * @param SubPage $subPage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page, SubPage $subPage)
    {
        return view('backend.page.sub.edit', compact('page', 'subPage'));
    }

    /**
     * @param Page $page
     * @param SubPage $subPage
     * @param SubPageUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Page $page, SubPage $subPage, SubPageUpdateRequest $request)
    {
        $subPage->update($request->subPageFillData($page->id));

        return redirect()
            ->back()
            ->with('success', trans('messages.update_success', ['entity' => 'Sub Page']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page $page
     * @param SubPage $subPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page, SubPage $subPage)
    {
        if ($subPage->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }
}
