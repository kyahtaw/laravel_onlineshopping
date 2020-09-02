<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Subcategory;

/*use Illuminate\Support\Facades\Route;*/


class PageController extends Controller
{
    public function mainfun($value='')
    {	
    	/*$route = Route::current();*/
    	/*dd($route);*/
        $items=Item::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
    	return view('main',compact('categories','subcategories','items'));

    }  
     public function brandfun($value='')
    {   
        /*$route = Route::current();*/
        /*dd($route);*/
        return view('brand');

    }  
    public function loginfun($value='')
    {   
        /*$route = Route::current();*/
        /*dd($route);*/
        return view('login');

    }  
    public function promotionfun($value='')
    {   
        return view('promotion');

    }  
    public function itemdetailfun($value='')
    {   
        return view('itemdetail');

    }  
    public function registerfun($value='')
    {   
        return view('register');

    } 
    public function shoppingcartfun($value='')

    {   
        $items=Item::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        
        return view('shoppingcart',compact('items','categories','subcategories'));

    }   
    public function subcategoryfun($value='')
    {   
        return view('subcategory');

    }   
}
