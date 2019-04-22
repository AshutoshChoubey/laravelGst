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
 /*
 *  File Name              :
 *  Type                   :    
 *  Description            :   
 *  Author                 : Ashtosh Kumar Choubey
 *  Contact                : 9658476170
 *  Email                  : ashutoshphoenixsoft@gmail.com
 *  Date                   : 12/12/2018  
 *  Modified By            :       
 *  Date of Modification   :     
 *  Purpose of Modification: 
 * 
 */ 

// Route::get('/', function () {
//     return view('GST.dashboard');
// }); 
Route::get('/', function () {
    return view('welcome');
}); 

Auth::routes(); 

Route::middleware('auth')->group(function() {
// Route::any('test',function(){
// print_r(Auth::user()->role_id);
// });
	// Workshop
 Route::view('/dashboard','GST.dashboard');
 Route::view('/dashboard/example/datable','GstMonsTem.example.datatable');
 Route::get('/GST/workshop/add','WorkshopController@save');
 Route::get('/GST/workshop/add/{id}','WorkshopController@save');
 Route::post('/GST/workshop/add','WorkshopController@save');
 Route::get('/GST/workshop/search','WorkshopController@view');
 Route::post('/GST/workshop/search','WorkshopController@view');
 Route::post('/GST/workshop/update','WorkshopController@save');
 Route::get('/GST/workshop/trash/{id}','WorkshopController@trash');
 Route::get('/GST/workshop/delete','WorkshopController@trashedList');
 Route::get('/GST/workshop/delete/{id}','WorkshopController@permanemetDelete');
 Route::get('/GST/workshop/view/{id}','WorkshopController@viewIndivisual'); 

// Start: Supplier Details
 Route::get('/GST/supplier/add','SupplierController@save');
 Route::post('/GST/supplier/add','SupplierController@save');
 Route::post('/GST/supplier/update','SupplierController@update');
 Route::get('/GST/supplier/add/{id}','SupplierController@save');
 Route::get('/GST/supplier/search','SupplierController@view');
 Route::post('/GST/supplier/search','SupplierController@view');
 Route::get('/GST/supplier/trash/{id}','SupplierController@trash');
 Route::get('/GST/supplier/delete','SupplierController@trashedList');
 Route::get('/GST/supplier/delete/{id}','SupplierController@permanemetDelete');
// End: Supplier Details

 // Start: Supplier Details
 Route::get('/GST/customer/add','CustomerController@save');
 Route::post('/GST/customer/add','CustomerController@save');
 Route::post('/GST/customer/update','CustomerController@update');
 Route::get('/GST/customer/add/{id}','CustomerController@save');
 Route::get('/GST/customer/search','CustomerController@view');
 Route::post('/GST/customer/search','CustomerController@view');
 Route::get('/GST/customer/trash/{id}','CustomerController@trash');
 Route::get('/GST/customer/delete','CustomerController@trashedList');
 Route::get('/GST/customer/delete/{id}','CustomerController@permanemetDelete');
// End: Supplier Details

 // Start: Product Unit Details
 Route::get('/GST/productUnit/add','ProductUnitController@save');
 Route::post('/GST/productUnit/add','ProductUnitController@save');
 Route::post('/GST/productUnit/update','ProductUnitController@update');
 Route::get('/GST/productUnit/add/{id}','ProductUnitController@save');
 Route::get('/GST/productUnit/search','ProductUnitController@view');
 Route::post('/GST/productUnit/search','ProductUnitController@view');
 Route::get('/GST/productUnit/trash/{id}','ProductUnitController@trash');
 Route::get('/GST/productUnit/delete','ProductUnitController@trashedList');
 Route::get('/GST/productUnit/delete/{id}','ProductUnitController@permanemetDelete');
// End: Product Unit Details 

 // Start: productColor  Details
 Route::get('/GST/productColor/add','ProductColorController@save');
 Route::post('/GST/productColor/add','ProductColorController@save');
 Route::post('/GST/productColor/update','ProductColorController@update');
 Route::get('/GST/productColor/add/{id}','ProductColorController@save');
 Route::get('/GST/productColor/search','ProductColorController@view');
 Route::post('/GST/productColor/search','ProductColorController@view');
 Route::get('/GST/productColor/trash/{id}','ProductColorController@trash');
 Route::get('/GST/productColor/delete','ProductColorController@trashedList');
 Route::get('/GST/productColor/delete/{id}','ProductColorController@permanemetDelete');
// End: productColor  Details 

 // Start:ProductTypeController
 Route::get('/GST/productType/add','ProductTypeController@save');
 Route::post('/GST/productType/add','ProductTypeController@save');
 Route::post('/GST/productType/update','ProductTypeController@update');
 Route::get('/GST/productType/add/{id}','ProductTypeController@save');
 Route::get('/GST/productType/search','ProductTypeController@view');
 Route::post('/GST/productType/search','ProductColorController@view');
 Route::get('/GST/productType/trash/{id}','ProductTypeController@trash');
 Route::get('/GST/productType/delete','ProductTypeController@trashedList');
 Route::get('/GST/productType/delete/{id}','ProductTypeController@permanemetDelete');
// End:ProductTypeController
  // Start:ProductTypeController
 Route::get('/GST/productModel/add','ProductModelController@save');
 Route::post('/GST/productModel/add','ProductModelController@save');
 Route::post('/GST/productModel/update','ProductModelController@update');
 Route::get('/GST/productModel/add/{id}','ProductModelController@save');
 Route::get('/GST/productModel/search','ProductModelController@view');
 Route::post('/GST/productModel/search','ProductModelController@view');
 Route::get('/GST/productModel/trash/{id}','ProductModelController@trash');
 Route::get('/GST/productModel/delete','ProductModelController@trashedList');
 Route::get('/GST/productModel/delete/{id}','ProductModelController@permanemetDelete');
// End:ProductTypeController
 // Start:ProductTypeController
 Route::get('/GST/productBrand/add','ProductBrandController@save');
 Route::post('/GST/productBrand/add','ProductBrandController@save');
 Route::post('/GST/productBrand/update','ProductBrandController@update');
 Route::get('/GST/productBrand/add/{id}','ProductBrandController@save');
 Route::get('/GST/productBrand/search','ProductBrandController@view');
 Route::post('/GST/productBrand/search','ProductBrandController@view');
 Route::get('/GST/productBrand/trash/{id}','ProductBrandController@trash');
 Route::get('/GST/productBrand/delete','ProductBrandController@trashedList');
 Route::get('/GST/productBrand/delete/{id}','ProductBrandController@permanemetDelete');
// End:ProductTypeController

 // Purchase Details
 
 Route::get('/GST/purchase/add','PurchaseController@save');
 Route::post('/GST/purchase/add','PurchaseController@save');
 Route::post('/GST/purchase/update','PurchaseController@update');
 Route::get('/GST/purchase/add/{id}','PurchaseController@save');
 Route::get('/GST/purchase/search','PurchaseController@view');
 Route::post('/GST/purchase/search','PurchaseController@view');
 Route::get('/GST/purchase/trash/{id}','PurchaseController@trash');
 Route::get('/GST/purchase/delete','PurchaseController@trashedList');
 Route::get('/GST/purchase/delete/{id}','PurchaseController@permanemetDelete');
 Route::get('/purchase-invoice-view/{id}','PurchaseController@purchaseInvoiceView');
 Route::get('/GST/purchase/view-purchase-invoice','PurchaseController@viewPurchaseInvoice');
 Route::post('/GST/purchase/view-purchase-invoice','PurchaseController@viewPurchaseInvoice');
 Route::get('/GST/purchase/view-purchase-return','PurchaseController@purcheseReturn');
 Route::get('/purchase-debit-notes/{id}','PurchaseController@purchaseDebitNotes');
 

 //Start: Product Details
 Route::get('/GST/product/add','ProductController@save');
 Route::post('/GST/product/add','ProductController@save');
 Route::post('/GST/product/update','ProductController@update');
 Route::get('/GST/product/add/{id}','ProductController@save');
 Route::get('/GST/product/search','ProductController@view');
 Route::post('/GST/product/search','ProductController@view');
 Route::get('/GST/product/trash/{id}','ProductController@trash');
 Route::get('/GST/product/delete','ProductController@trashedList');
 Route::get('/GST/product/delete/{id}','ProductController@permanemetDelete');
//End: Product Details
 
 // Start: Service Details
 Route::get('/GST/service/add','ServiceController@save');
 Route::post('/GST/service/add','ServiceController@save');
 Route::post('/GST/service/update','ServiceController@update');
 Route::get('/GST/service/add/{id}','ServiceController@update');
 Route::get('/GST/service/search','ServiceController@view');
 Route::post('/GST/service/search','ServiceController@view');
 Route::get('/GST/service/trash/{id}','ServiceController@trash');
 Route::get('/GST/service/delete','ServiceController@trashedList');
 Route::get('/GST/service/delete/{id}','ServiceController@permanemetDelete');
 Route::post('GST/model/add','ServiceController@model');
 Route::post('/GST/brand/add','ServiceController@brand');
 Route::post('/GST/service_name/add','ServiceController@service');
 Route::post('/GST/serviceType/add','ServiceController@serviceType');
 // End: Service Details

  //Start: sale Details
Route::get('/GST/sales/add','SalesController@save');
Route::post('/GST/sales/add','SalesController@save');
Route::post('/GST/sales/update','SalesController@update');
Route::get('/GST/sales/add/{id}','SalesController@save');
Route::get('/GST/sales/search','SalesController@view');
Route::post('/GST/sales/search','SalesController@view');
Route::get('/GST/sales/trash/{id}','SalesController@trash');
Route::get('/GST/sales/delete','SalesController@trashedList');
Route::get('/GST/sales/delete/{id}','SalesController@permanemetDelete');
Route::get('/GST/sales/view-sale-invoice','SalesController@viewSaleInvoice');
Route::post('/GST/sales/view-sale-invoice','SalesController@viewSaleInvoice');
Route::get('/GST/sales/view-sale-return','SalesController@saleReturn');
Route::get('/sale-invoice-view/{id}','SalesController@saleInvoiceView');

//End: sale Details

// Start: Master Form Details
 Route::post('/master/brands','MasterController@brand');
 Route::post('/master/modal','MasterController@modal');
 Route::post('/master/service_name','MasterController@service');
 Route::post('/master/service_type','MasterController@serviceType');
 Route::get('/master/brands','MasterController@brand');
 Route::get('/master/modal','MasterController@modal');
 Route::get('/master/service_name','MasterController@service');
 Route::get('/master/service_type','MasterController@serviceType');
 Route::get('/master/brands/{id}','MasterController@brandUpdate');
 Route::get('/master/modal/{id}','MasterController@modalUpdate');
 Route::get('/master/service_name/{id}','MasterController@serviceUpdate');
 Route::get('/master/service_type/{id}','MasterController@serviceTypeUpdate');
 Route::get('/master/brands/update/{id}','MasterController@brandUpdate');
 Route::get('/master/modal/update/{id}','MasterController@modalUpdate');
 Route::get('/master/service_name/update/{id}','MasterController@serviceUpdate');
 Route::get('/master/service_type/update/{id}','MasterController@serviceTypeUpdate');
 Route::post('/master/brands/update','MasterController@brandUpdate');
 Route::post('/master/modal/update','MasterController@modalUpdate');
 Route::post('/master/service_name/update','MasterController@serviceUpdate');
 Route::post('/master/service_type/update','MasterController@serviceTypeUpdate');

// End: Master Form Details


 // Start:  Marketing Details
 Route::post('/marketing/add','MarketingController@save');
 Route::post('/marketing/update','MarketingController@update');
 Route::post('/marketing/search','MarketingController@view');
 Route::get('/marketing/add','MarketingController@save');
 Route::get('/marketing/add/{id}','MarketingController@save');
 Route::get('/marketing/search','MarketingController@view');
 Route::get('/marketing/delete','MarketingController@trashedList');
 Route::get('/marketing/trash/{id}','MarketingController@trash');
 Route::get('/marketing/delete/{id}','MarketingController@permanemetDelete');
// End: Marketing Details
 // Start:  Marketing Details
 Route::post('/credit-debit/add','CreditDebitController@save');
 Route::post('/credit-debit/update','CreditDebitController@update');
 Route::post('/credit-debit/search','CreditDebitController@view');
 Route::get('/credit-debit/add','CreditDebitController@save');
 Route::get('/credit-debit/add/{id}','CreditDebitController@save');
 Route::get('/credit-debit/search','CreditDebitController@view');
 Route::get('/credit-debit/delete','CreditDebitController@trashedList');
 Route::get('/credit-debit/trash/{id}','CreditDebitController@trash');
 Route::get('/credit-debit/delete/{id}','CreditDebitController@permanemetDelete');
// End: Marketing Details


 // Start:  Marketing Details
 // Route::post('/credit-debit/add','CreditDebitDetailController@save');
 // Route::post('/credit-debit/update','CreditDebitDetailController@update');
 // Route::post('/credit-debit/search','CreditDebitDetailController@view');
 // Route::get('/credit-debit/add','CreditDebitDetailController@save');
 // Route::get('/credit-debit/add/{id}','CreditDebitDetailController@save');
 // Route::get('/credit-debit/search','CreditDebitDetailController@view');
 // Route::get('/credit-debit/delete','CreditDebitDetailController@trashedList');
 // Route::get('/credit-debit/trash/{id}','CreditDebitDetailController@trash');
 // Route::get('/credit-debit/delete/{id}','CreditDebitDetailController@permanemetDelete');
// End: Marketing Details

 // Start: Ajax Related
Route::post('/ajax/getPurchase','AjaxController@getPurchase');
Route::post('/ajax/getModal','AjaxController@getProductModel');
Route::post('/ajax/getSupplierDetailById','AjaxController@getSupplierDetailById');
Route::post('/ajax/getCustomerDetailById','AjaxController@getCustomerDetailById');
Route::post('/ajax/getBrandByProductType','AjaxController@getBrandByProductType');
Route::post('/ajax/getColorByBrand','AjaxController@getColorByBrand');
Route::post('/ajax/getModelByBrand','AjaxController@getModelByBrand');
Route::post('/ajax/getColorByBrandModelType','AjaxController@getColorByBrandModelType');
Route::post('/ajax/getNameByBrandModelTypeColor','AjaxController@getNameByBrandModelTypeColor');
Route::post('/ajax/getProduct','AjaxController@getProduct');
Route::post('/ajax/saleReturn','AjaxController@saleReturn');
Route::post('/ajax/purchaseReturn','AjaxController@purchaseReturn');




// End: Ajax Related
/**
 * Start: Employee Module
 */

Route::get('/employee', 'MasterformsController@addUser')->name('employee');
Route::post('/employee-save', 'MasterformsController@addUser')->name('employee-save');
Route::get('/employee-list', 'MasterformsController@userList')->name('employee-list');
Route::get('/employee-edit/{id}', 'MasterformsController@addUser')->name('employee-edit');
Route::get('/employee/block/{type}/{id}', 'MasterformsController@blockUser')->name('employee-edit');
Route::get('/employee/trash/{type}/{id}', 'MasterformsController@trashUser')->name('employee-edit');
Route::get('/employee/{id}/{view}', 'MasterformsController@addUser')->name('employee-edit');

Route::get('/get-payment-overview/{sid}', 'StudentController@paymentOverview')->name('get-payment-overview');
Route::get('/get-payment-overview-by-year-id/{sid}/{year}', 'StudentController@paymentOverview')->name('get-payment-overview');
/**
 * End: Employee Module
 */
 

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
