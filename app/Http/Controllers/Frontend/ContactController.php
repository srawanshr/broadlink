<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Http\Requests;
use App\Models\Setting;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = Page::contact();
        $contacts = Contact::all()->groupBy('type');
        $contactTypes = Contact::types();
        $settings = Setting::lists('value', 'slug');

        return view('frontend.contact.index', compact('page', 'contacts', 'contactTypes', 'settings'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function sendFeedback(Request $request)
    {
        Mail::raw($request->get('message'), function ($message) use ($request) {
            $message->from($request->get('email'));
            $message->subject($request->get('subject'));
            $message->to(setting('email'));
        });

        return redirect()->back()->withSuccess('Thank you for your feedback!');
    }

    public function subscribe(Request $request)
    {
        Mail::raw($request->get('email').' wants to subscribe to the newsletter. ', function ($message) {
            $message->from('no-reply@broadlink.com');
            $message->subject("Subscription Notification");
            $message->to(setting('email'));
        });

        return redirect()->back()->withSuccess('Thank you for subscribing!');
    }
}