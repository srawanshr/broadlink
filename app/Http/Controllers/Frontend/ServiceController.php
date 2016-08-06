<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use App\Models\Product;

class ServiceController extends Controller
{
    public function index ()
    {
        $page = Page::whereSlug ( 'service' )->first ();

        return view ( 'frontend.services.index', compact ( 'page' ) );
    }

    public function show ( Service $service )
    {
        return view ( 'frontend.services.show', compact ( 'service' ) );
    }
}
