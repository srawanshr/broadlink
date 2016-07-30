<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Service;
use App\Models\Page;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }

    public function contact()
    {
        $page = Page::contact();
    	return view('frontend.contact.index', compact('page'));
    }

    public function help()
    {
    	return view('frontend.help.index');
    }
}
