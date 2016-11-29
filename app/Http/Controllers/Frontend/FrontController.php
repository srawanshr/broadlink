<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;

class FrontController extends Controller
{
    public function index()
    {
        return view( 'frontend.index' );
    }

    public function help()
    {
        return view( 'frontend.help.index' );
    }

    public function page( Page $page )
    {
        return view( 'frontend.pages.show', compact( 'page' ) );
    }

    public function post( Post $post )
    {
        return view( 'frontend.post.show', compact( 'post' ) );
    }
}
