<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use View;
use Session;

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
    	$data1 = array(
            'custname' => $request->name,
            'contact_number' => $request->contact,
            'complaint_email' => $request->comp_email,
            'custadd' => $request->address,
            'complaint_message' => $request->c_message);
        Mail::send('emails.complaint',$data1,function($message) use ($data1){
            $message->from($data1['complaint_email']);
            $message->to('bod@broadlink.com.np')->subject('Complaint');
        });
    	Mail::send('emails.complaintreply',$data1,function($m) use ($data1){
    		$m->from('bod@broadlink.com.np');
    		$m->to($data1['complaint_email'])->subject('Complaint');
    	});
        Session::flash('Success','Your complaint has been submitted. Thank you!');
        return view('frontend.pages.complaint');
    }
}