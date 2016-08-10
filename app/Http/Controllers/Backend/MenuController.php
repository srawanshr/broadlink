<?php

namespace App\Http\Controllers\Backend;

use App\Models\Menu;
use App\Models\Page;
use App\Http\Requests;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller {

    protected $menu;

    /**
     * MenuController constructor.
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $menu_items = $this->menu->orderBy('order')->get();

        $allPages = Page::draft(false)->get();
        $pages = [];
        foreach ($allPages as $page) {
            $pages[route('page::show', $page->slug)] = $page->title;
        }
        $menuTypes = [
            0 => 'Single',
            1 => 'Dropdown',
            2 => 'Mega Dropdown'
        ];

        return view('backend.menu.index', compact('menu_items', 'pages', 'menuTypes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $inputs = $request->all();

        dd($inputs);

        $order = 0;
        foreach ($inputs['menu'] as $id => $item)
        {
            $menu_item = $menu_item = $this->menu->find($id);

            if ($menu_item)
            {
                $menu_item->update(['title' => $item['title'], 'order' => $order, 'icon' => $item['icon']]);
            }
            $order++;
        }

        return redirect()->back()->with('success', trans('messages.update_success', ['entity' => 'Menu']));
    }
}
