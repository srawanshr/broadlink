<?php

namespace App\Http\Controllers\Backend;

use Datatables;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller {

    public function index()
    {
        return view('backend.customer.index');
    }

    public function customerList()
    {
        $user = User::query();

        return Datatables::of($user)->make(true);
    }
}
