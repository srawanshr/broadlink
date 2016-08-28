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

    public function order(Service $service, Product $product)
    {
        $user = auth()->guard('user')->user();

        if($user)
            $formData = [
                'name' => $user->display_name,
                'email' => $user->email,
                'subject' => 'Service Inquiry',
                'message' => "I would like to get the $product->name service of $service->name service. My phone number is 98xxxxxxxx."
            ];
        else
            $formData = [
                'subject' => 'Service Inquiry',
                'message' => "I would like to get the $product->name service of $service->name service. My phone number is 98xxxxxxxx."
            ];
        return view('frontend.partials.contactform', compact('formData'));
    }
}
