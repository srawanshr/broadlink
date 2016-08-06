<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Http\Requests;
use App\Models\Service;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
    	$page = Page::whereSlug('service')->first();
    	return view('frontend.services.index', compact('page'));
    }

    public function show(Service $service)
    {
    	return view('frontend.services.show', compact('service'));
    }
}
