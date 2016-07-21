<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::all();

        return view('backend.setting.index', compact('settings'));
    }
}
