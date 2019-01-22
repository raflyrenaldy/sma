<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registration;
use App\blog;

class adminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
    	$blog = blog::count();
    	$jum = registration::whereYear('created_at',date('Y'))->count();
    	$accept = registration::where('status',1)->whereYear('created_at',date('Y'))->count();
    	$reject = registration::where('status',2)->whereYear('created_at',date('Y'))->count();
    	return view('/admin.home',compact('blog','jum','accept','reject'));
    }

    
}
