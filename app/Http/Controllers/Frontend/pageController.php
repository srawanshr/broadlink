<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{
    public function index()
    {
        //return the view for form
    }
    public function complain()
    {
        //return the view for form
    }
    public function forms(Request $request)
    {
    	$data=request->all();
    	Mail::send('',$data['email']=>$from,function($m) use ($from){
    		$m->from($data['email'],'$message');
    		$m->to('bod@broadlink.com.np')->subject('Request For Partnership');
    	});

        //redirect affter this
    }
    public function registercomplaint(Request $request)
    {
    	$data=request->all();
    	Mail::send('',$data['email']=>$from,function($m) use ($from){
    		$m->from($data['email'],'$message');
    		$m->to('bod@broadlink.com.np')->subject('Complaint');
    	});

        //redirect affter this
    }
}