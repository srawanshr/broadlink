<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
    	return view('frontend.services.index');
    }

    public function show($service)
    {
    	return view('frontend.services.show', compact('service'));
    }
}
