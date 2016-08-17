<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Http\Requests;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }

    public function help()
    {
    	return view('frontend.help.index');
    }

    public function page(Page $page)
    {
        return view('frontend.pages.show', compact('page'));
    }
}
