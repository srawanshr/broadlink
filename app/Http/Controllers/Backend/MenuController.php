<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\Menu;
use App\Models\Page;
use App\Models\SubMenu;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller {

    protected $menu;

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $primaryMenus = Menu::with(['image', 'subMenus' => function($q) {
            $q->orderBy('order');
        }])->orderBy('order')->get();

        $allPages = Page::draft(false)->get();
        $pages = [];
        foreach ($allPages as $page)
        {
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
        DB::transaction(function () use ($request)
        {
            $order = 1;
            $suborder = 1;
            $menuIds = [];
            $subMenuIds = [];
            foreach ($request->get('primary-menu-list') as $key => $data)
            {
                $data['slug'] = str_slug($data['name']);
                $data['order'] = $order;
                if ($menu = Menu::find($key))
                    $menu->update($data);
                else
                    $menu = Menu::create($data);

                array_push($menuIds, $menu->id);

                if ($request->hasFile('primary-menu-list.' . $key))
                {
                    $image = $request->file('primary-menu-list.' . $key . '.image');
                    if ($menu->image)
                        $menu->image->upload($image);
                    else
                        $menu->image()->create(['name' => cleanFileName($image)])->upload($image);
                }

                // for submenus
                if ($subMenus = $request->get('dropdown-menu-list-' . $key, false))
                {
                    foreach ($subMenus as $key => $subData)
                    {
                        $subData['slug'] = str_slug($subData['name']);
                        $subData['order'] = $suborder;
                        if ($submenu = $menu->subMenus()->find($key))
                            $submenu->update($subData);
                        else
                            $submenu = $menu->subMenus()->create($subData);

                        $suborder ++;
                        array_push($subMenuIds, $submenu->id);
                    }
                }

                $order ++;
            }

            Menu::whereNotIn('id', $menuIds)->delete();
            SubMenu::whereNotIn('id', $subMenuIds)->delete();

        });

        return redirect()->back()->with('success', trans('messages.update_success', ['entity' => 'Menu']));
    }
}
