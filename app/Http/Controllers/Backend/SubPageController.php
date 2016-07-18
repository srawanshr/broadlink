<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\SubPage;
use Illuminate\Support\Facades\Auth;

class SubPageController extends Controller
{
    protected $user;

    /**
     * SubPageController constructor.
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        if (!$this->user->can('read.cms')) return redirect()->route('errors', '401');

        $raw = SubPage::all();

        $filtered = $raw->filter(function ($item) {
            return $item->subpageable->country_id == country()->id;
        });

        $subPages = new Paginator($filtered, $filtered->count(), 15);

        return view('admin.pages.subpages.index', compact('subPages'));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        if (!$this->user->can('create.cms')) return redirect()->route('errors', '401');

        $pages = $this->pages();

        return view('admin.pages.subpages.create', compact('pages'));
    }

    /**
     * @param null $page
     * @return array
     */
    public function pages($page = null)
    {
        $pages = [
            'HomePage' => 'Home Page',
            'AboutPage' => 'About Page',
            'ContactPage' => 'Contact Page',
        ];

        if ($page) {
            return country()->$page;
        } else {
            return $pages;
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        if (!$this->user->can('create.cms')) return redirect()->route('errors', '401');

        $inputs = $request->all();
        $inputs['slug'] = str_slug($inputs['title']);

        $page = $this->pages($inputs['page_id']);

        $page->subPages()->create($inputs);

        return redirect()->back()->with('success', 'Sub page created!');
    }

    /**
     * @param SubPage $subPage
     * @return mixed
     */
    public function edit(SubPage $subPage)
    {
        if (!$this->user->can('update.cms')) return redirect()->route('errors', '401');

        $pages = $this->pages();

        return view('admin.pages.subpages.edit', compact('pages', 'subPage'));
    }

    /**
     * @param Request $request
     * @param SubPage $subPage
     * @return mixed
     */
    public function update(Request $request, SubPage $subPage)
    {
        if (!$this->user->can('update.cms')) return redirect()->route('errors', '401');

        $inputs = $request->except(['_token', '_method', 'page_id']);
        $inputs['slug'] = str_slug($inputs['title']);

        $page = $this->pages($request->get('page_id'));

        $page->subPages()->update($inputs);

        return redirect()->route('admin.subpage.edit', $inputs['slug'])->withSuccess('Sub page updated!');
    }

    /**
     * @param SubPage $subPage
     * @return mixed
     * @throws \Exception
     */
    public function destroy(SubPage $subPage)
    {
        if (!$this->user->can('delete.cms')) return redirect()->route('errors', '401');

        $subPage->delete();

        return redirect()->back()->with('success', 'Sub Page deleted!');
    }
}
