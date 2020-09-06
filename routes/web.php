<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/

Route::get('/', 'PageController@mainfun')->name('mainpage');
Route::get('brand/{id}', 'PageController@brandfun')->name('brandpage');
Route::get('loginpage', 'PageController@loginfun')->name('loginpage');
Route::get('promotion', 'PageController@promotionfun')->name('promotionpage');
Route::get('itemdetail/{id}', 'PageController@itemdetailfun')->name('itemdetailpage');
Route::get('registerpage', 'PageController@registerfun')->name('registerpage');
Route::get('shoppingcart', 'PageController@shoppingcartfun')->name('shoppingcartpage');
Route::get('subcategorypage', 'PageController@subcategoryfun')->name('subcategorypage');

Route::resource('brands','BrandController');
Route::resource('category','CategoryController');
Route::resource('subcategory','SubCategoryController');


Route::resource('orders','OrderController');

Route::middleware('role:Admin')->group(function(){
Route::get('dashboard', 'BackendController@dashboardfun')->name('dashboardpage');
Route::resource('items','ItemController');

});


Auth::routes();

Route::get('/home', 'PageController@mainfun')->name('home');
