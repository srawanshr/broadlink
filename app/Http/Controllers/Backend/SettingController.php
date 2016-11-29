<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller {

    protected $setting;

    /**
     * SettingController constructor.
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = $this->setting->all();

        return view('backend.setting.index', compact('settings'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $inputs = $request->get('setting');
        $inputs['pop-up-enabled'] = $request->get('setting.pop-up-enabled', 0);
        
        foreach ($inputs as $slug => $value)
        {
            $setting = $this->setting->fetch(str_slug($slug))->first();

            if ($setting) $setting->update(['value' => $value]);
        }

        if ($request->hasFile('pop-up'))
        {
            $image = $request->file('pop-up');

            $setting = $this->setting->fetch(str_slug('pop-up'))->first();

            $setting->image->upload($image);

            $setting->update(['value' => $setting->image->path]);
        }

        return redirect()->back()->with('success', trans('messages.update_success', ['entity' => 'Setting']));
    }
}
