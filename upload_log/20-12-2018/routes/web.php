<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function() {

	// Workshop
 Route::view('/dashboard','SaiAutoCare.dashboard');
 Route::get('/SaiAutoCare/workshop/add','WorkshopController@save');
 Route::get('/SaiAutoCare/workshop/add/{id}','WorkshopController@save');
 Route::post('/SaiAutoCare/workshop/add','WorkshopController@save');
 Route::get('/SaiAutoCare/workshop/search','WorkshopController@view');
 Route::post('/SaiAutoCare/workshop/search','WorkshopController@view');
 Route::post('/SaiAutoCare/workshop/update','WorkshopController@save');
 Route::get('/SaiAutoCare/workshop/trash/{id}','WorkshopController@trash');
 Route::get('/SaiAutoCare/workshop/delete','WorkshopController@trashedList');
 Route::get('/SaiAutoCare/workshop/delete/{id}','WorkshopController@permanemetDelete');
 Route::get('/SaiAutoCare/workshop/view/{id}','WorkshopController@viewIndivisual');

// Supplier Details
 
 Route::get('/SaiAutoCare/supplier/add','SupplierController@save');
 Route::post('/SaiAutoCare/supplier/add','SupplierController@save');
 Route::post('/SaiAutoCare/supplier/update','SupplierController@save');
 Route::get('/SaiAutoCare/supplier/add/{id}','SupplierController@save');
 Route::get('/SaiAutoCare/supplier/search','SupplierController@view');
 Route::post('/SaiAutoCare/supplier/search','SupplierController@view');
 Route::get('/SaiAutoCare/supplier/trash/{id}','SupplierController@trash');
 Route::get('/SaiAutoCare/supplier/delete','SupplierController@trashedList');
 Route::get('/SaiAutoCare/supplier/delete/{id}','SupplierController@permanemetDelete');

 // Purchase Details
 
 Route::get('/SaiAutoCare/purchase/add','PurchaseController@save');
 Route::post('/SaiAutoCare/purchase/add','PurchaseController@save');
 Route::post('/SaiAutoCare/purchase/update','PurchaseController@update');
 Route::get('/SaiAutoCare/purchase/add/{id}','PurchaseController@save');
 Route::get('/SaiAutoCare/purchase/search','PurchaseController@view');
 Route::post('/SaiAutoCare/purchase/search','PurchaseController@view');
 Route::get('/SaiAutoCare/purchase/trash/{id}','PurchaseController@trash');
 Route::get('/SaiAutoCare/purchase/delete','PurchaseController@trashedList');
 Route::get('/SaiAutoCare/purchase/delete/{id}','PurchaseController@permanemetDelete');

 // Product Details
 
 Route::get('/SaiAutoCare/product/add','ProductController@save');
 Route::post('/SaiAutoCare/product/add','ProductController@save');
 Route::post('/SaiAutoCare/product/update','ProductController@save');
 Route::get('/SaiAutoCare/product/add/{id}','ProductController@save');
 Route::get('/SaiAutoCare/product/search','ProductController@view');
 Route::post('/SaiAutoCare/product/search','ProductController@view');
 Route::get('/SaiAutoCare/product/trash/{id}','ProductController@trash');
 Route::get('/SaiAutoCare/product/delete','ProductController@trashedList');
 Route::get('/SaiAutoCare/product/delete/{id}','ProductController@permanemetDelete');
 Route::post('/ajax/getProduct','AjaxController@getProduct');

 //Route::view('/SaiAutoCare/purchase/add','SaiAutoCare.purchase.add');
 // Route::post('/SaiAutoCare/supplier/add','SupplierController@save');
 // Route::post('/SaiAutoCare/supplier/update','SupplierController@save');
 // Route::get('/SaiAutoCare/supplier/add/{id}','SupplierController@save');
 // Route::get('/SaiAutoCare/supplier/search','SupplierController@view');
 // Route::post('/SaiAutoCare/supplier/search','SupplierController@view');
 // Route::get('/SaiAutoCare/supplier/trash/{id}','SupplierController@trash');
 // Route::get('/SaiAutoCare/supplier/delete','SupplierController@trashedList');
 // Route::get('/SaiAutoCare/supplier/delete/{id}','SupplierController@permanemetDelete');
 // Route::get('/SaiAutoCare/workshop/add/{id}','WorkshopController@save');
 // Route::post('/SaiAutoCare/workshop/add','WorkshopController@save');
 // Route::get('/SaiAutoCare/workshop/search','WorkshopController@view');
 // Route::post('/SaiAutoCare/workshop/search','WorkshopController@view');
 // Route::post('/SaiAutoCare/workshop/update','WorkshopController@save');
 // Route::get('/SaiAutoCare/workshop/trash/{id}','WorkshopController@trash');
 // Route::get('/SaiAutoCare/workshop/delete','WorkshopController@trashedList');
 // Route::view('/sample/dashboard','samples.buttons');
	// Route::view('/sample/social','samples.social');
	 Route::view('/sample/cards','samples.cards');
	 Route::view('/sample/forms','samples.forms');
	// Route::view('/sample/modals','samples.modals');
	// Route::view('/sample/switches','samples.switches');
	// Route::view('/sample/tables','samples.tables');
	// Route::view('/sample/tabs','samples.tabs');
	// Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
	// Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
	// Route::view('/sample/widgets','samples.widgets');
	// Route::view('/sample/charts','samples.charts');
	
});

Route::get('/home', 'HomeController@index')->name('home');
