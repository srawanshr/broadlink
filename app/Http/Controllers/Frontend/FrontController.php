<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Http\Requests;
use App\Models\Contact;
use App\Models\Service;
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
        $contacts = Contact::all()->groupBy('type');
        $contactTypes = Contact::types();
    	return view('frontend.contact.index', compact('page', 'contacts', 'contactTypes'));
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
