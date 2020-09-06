<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
  public function dashboardfun($value='')
    {	
    	
    	return view('backend.dashboard');
    }

    public function itemfun($value='')
    {	
    	
    	return view('backend.dashboard');
    }

}
