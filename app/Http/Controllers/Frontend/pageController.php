<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class pageController extends Controller
{
    public function index()
    {

    }
    public function complain()
    {

    }
    public function forms(Request $request)
    {
    	$data=request->all();
    	Mail::send('',$data['email']=>$from,function($m) use ($from){
    		$m->from($data['email'],'$message');
    		$m->to('bod@broadlink.com.np')->subject('Request For Partnership');
    	});
    }
    public function registercomplaint(Request $request)
    {
    	$data=request->all();
    	Mail::send('',$data['email']=>$from,function($m) use ($from){
    		$m->from($data['email'],'$message');
    		$m->to('bod@broadlink.com.np')->subject('Complaint');
    	});

    }
}