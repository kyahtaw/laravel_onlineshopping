<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
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
        $brands = Brand::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
    	return view('main',compact('categories','subcategories','items','brands'));

    }  
     public function brandfun($id)
    {   
        /*$route = Route::current();*/
        /*dd($route);*/
        $items=Item::all();
        $categories=Category::all();
        $brands=Brand::find($id);
        $subcategories=Subcategory::all();
        return view('brand',compact('categories','subcategories','items','brands'));

    }  
    public function loginfun($value='')
    {   
        /*$route = Route::current();*/
        /*dd($route);*/
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('login',compact('categories','subcategories'));

    }  
    public function promotionfun($value='')
    {   

        $items=Item::all();
        $brands = Brand::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('promotion',compact('categories','subcategories','items','brands'));

    }  
    public function itemdetailfun($id)
    {   
        $item = Item::find($id);
        $categories=Category::all();
        $brands=Brand::all();
        $subcategories=Subcategory::all();
        return view('itemdetail',compact('categories','subcategories','item','brands'));

    }  
    public function registerfun($value='')
    {   

        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('register',compact('categories','subcategories'));

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
