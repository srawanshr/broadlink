<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;
use App\Models\Page;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Mail;

class ServiceController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = Page::whereSlug('service')->first();

        return view('frontend.services.index', compact('page'));
    }

    /**
     * @param Service $service
     * @return \Illuminate\View\View
     */
    public function show(Service $service)
    {
        return view('frontend.services.show', compact('service'));
    }

    /**
     * @param Service $service
     * @param Product $product
     * @return \Illuminate\View\View
     */
    public function orderForm(Service $service, Product $product)
    {
        $user = auth()->guard('user')->user();

        if ($user)
            $formData = [
                'name'    => $user->display_name,
                'email'   => $user->email,
                'subject' => 'Service Inquiry',
                'phone'   => $user->phone,
                'message' => "I would like to get the $product->name service of $service->name service."
            ];
        else
            $formData = [
                'subject' => 'Service Inquiry',
                'message' => "I would like to get the $product->name service of $service->name service."
            ];

        return view('frontend.services.order', compact('formData'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function order(Request $request, AppMailer $mailer)
    {
        $data = [
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'subject'   => $request->get('subject'),
            'msg'       => $request->get('message'),
            'longitude' => $request->get('longitude'),
            'latitude'  => $request->get('latitude'),
        ];

        $mailer->sendOrderNotification($data);

        return redirect()->back()->withSuccess('Your request has been received. Our representatives will contact you very soon!');
    }
}
