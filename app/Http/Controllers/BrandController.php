<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $brands = Brand::all();
        /*dd($items);*/
        return view('backend.items.brandindex',compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.items.creatbrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            "name" => 'required',
            "photo" =>'required'
        ]);

        //if include file,upload file
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backend/itemimg'),$imageName);

        $path='backend/itemimg/'.$imageName;//when save to database use $path
        //data insert

        $brand = new Brand;
        $brand ->name = $request->name;
        $brand ->photo= $path;
        $brand->save();

        //redirect
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {

       return view('backend.items.editbrand',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            
            "name" => 'required',
            "photo" =>'sometimes',
            "oldphoto" =>'required'

        ]);
        //file upload
        if($request->hasFile('photo')){

             $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backend/itemimg'),$imageName);

        $path='backend/itemimg/'.$imageName;//when save to database use $path
        //data insert

        }else{
            $path = $request->oldphoto;
        }
        //data update
         $brand ->name = $request->name;
        $brand ->photo= $path;
        $brand->save();

        //redirect
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
         $brand->delete();
        return redirect()->route('brands.index');
    }
}
