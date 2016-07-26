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

        $iconList = [];
        $material_icons_json = File::get('assets\backend\icons\material-design-icons\MaterialIcons-Regular.ijmap');
        $material_icons = json_decode($material_icons_json);

        foreach ($material_icons->icons as $id => $data) {
            $iconList[$id] = $data->name;
        }

        return view('backend.menu.index', compact('menu_items', 'iconList'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $inputs = $request->all();

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
