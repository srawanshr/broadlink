<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\Menu;
use App\Models\SubMenu;
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
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $primaryMenus = Menu::with('image', 'subMenus')->orderBy('order')->get();

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

        return view('backend.menu.index', compact('primaryMenus', 'pages', 'menuTypes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        DB::transaction(function() use ($request) {
            $order = 0;
            foreach ($request->get('primary-menu-list') as $key => $data) {
                $data['slug'] = str_slug($data['name']);
                $data['order'] = $order;
                if($menu = Menu::find($key))
                    $menu->update($data);
                else
                    $menu = Menu::create($data);

                if($request->hasFile('primary-menu-list.'.$key))
                {
                    $image = $request->file('primary-menu-list.'.$key.'.image');
                    if ($menu->image)
                        $menu->image->upload($image);
                    else
                        $menu->image()->create(['name' => cleanFileName($image)])->upload($image);
                }

                // for submenus
                if ($subMenus = $request->get('dropdown-menu-list-'.$key, false))
                {
                    $suborder = 1;
                    foreach ($subMenus as $key => $subData) {
                        $subData['slug'] = str_slug($subData['name']);
                        if($submenu = $menu->subMenus()->find($key))
                            $submenu->update($subData);
                        else
                            $menu->subMenus()->create($subData);
                    }
                }

                $order++;
            }
        });

        return redirect()->back()->with('success', trans('messages.update_success', ['entity' => 'Menu']));
    }
}
