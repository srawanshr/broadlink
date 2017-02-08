<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use View;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.form');
    }
    public function complain()
    {
        return view('frontend.pages.complaint');
    }
    public function forms(Request $request)
    {
        $data= array(
            'email'=>$request->email1,
            'btype'=>$request->bldtype,
            'cname'=>$request->name,
            'cnum'=>$request->number,
            'compname'=>$request->company_name,
            'cih'=>$request->investment_history,
            'ct'=>$request->turnover,
            'cia'=>$request->intrested_area,
            'ci'=>$request->investment,
            'cisp'=>$request->isp_query,
            'cpd'=>$request->package_detail,
            'ccomments'=>$request->comments,
            );
        Mail::send('emails.submit',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('bod@broadlink.com.np')->subject('Request For Partnership');
        });
    	Mail::send('emails.formreply',$data,function($message) use ($data){
    		$message->from('bod@broadlink.com.np');
    		$message->to($data['email'])->subject('Request For Partnership');
    	});

        return view('frontend.pages.form')->withSuccess('Your request has been submitted. Thank you!');
    }
    public function registercomplaint(Request $request)
    {
    	$data=$request->all();
    	Mail::send('emails.complaintreply',$data,function($m) use ($data){
    		$m->from('bod@broadlink.com.np');
    		$m->to($data['email1'])->subject('Complaint');
    	});
        return view('frontend.pages.complaint')->withSuccess('Your complaint has been submitted. Thank you!');
    }
}