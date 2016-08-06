<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function dashboard() {
		$user = auth()->user();
    	return view('frontend.user.index', compact('user'));
	}
}
