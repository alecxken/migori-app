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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product-add', 'ProductController@new')->name('new');

Route::get('/product-projects', 'ProductController@project')->name('new');




#create-store routes


Route::post('/order-update','StockController@storeorderupdate');

Route::get('/stock-pdf','StockController@createPDF');

Route::get('/stock-order','StockController@stockorder');

Route::get('/stock-order-view','StockController@stockorderview');

Route::get('/stock-view/{id}','StockController@stockorderviewnow');

Route::get('/preview-sent-view/{id}','StockController@stockorderviewnow');




Route::post('/order-store','StockController@storeorder');

Route::get('/supplier-create','SupplierController@createsupplier');

Route::get('supplier-get/{id}','SupplierController@getsupplier');

Route::get('/supplier-drop/{id}','SupplierController@deletesupplier');

Route::post('/supplier-store','SupplierController@storesupplier');

Route::post('/supplier-update','SupplierController@updatesupplier');


#end creation of store
#create-store routes


Route::get('/store-create','StoreController@createstore');

Route::get('store-get/{id}','StoreController@getstore');

Route::get('/store-drop/{id}','StoreController@deletestore');

Route::get('/store-drop/{id}','StoreController@deletestore');

Route::post('/store-store','StoreController@storestore');

Route::post('/store-update','StoreController@updatestore');


Route::get('/stock-transfer','StockController@stocktransfer');

Route::get('/stockindex','StockController@stockindex');

Route::post('/store-stocks','StockController@storetransfer');

#end creation of store

#create-store routes


Route::get('/stock-create','StockController@createstock');

Route::get('stock-get/{id}','StockController@getstock');

Route::get('/stock-drop/{id}','StockController@deletestock');

Route::post('/stock-store','StockController@storestock');

Route::post('/stock-update','StockController@updatestock');


#end creation of store

#create-store routes
Route::get('/calendar','ProductController@calendar');

Route::get('/product-view','ProductController@viewproduct');

Route::get('/product-create','ProductController@createproduct');

Route::get('product-get/{id}','ProductController@getproduct');

Route::get('/product-drop/{id}','ProductController@deleteproduct');

Route::post('/product-store','ProductController@storeproduct');

Route::post('/product-update','ProductController@updateproduct');


#end creation of store

#roles and permissions
//permissions and Roles
Route::resource('admin', 'UserController');
Route::resource('roles', 'RoleController');
//roles RouteServiceProvider
Route::get('/roles_index','RoleController@index');
Route::get('/roles_create','RoleController@create');
Route::post('/roles_store','RoleController@store');
Route::post('/roles_update/{id}','RoleController@update');
Route::post('/roles_destroy/{id}','RoleController@destroy');
Route::post('/roles_edit/{id}','RoleController@edit');
Route::post('/roles_show/{id}','RoleController@show');

// Route::get('/profile','HomeController@profile');
// Route::post('/profileupdate','HomeController@profileupdate');
// Route::get('create-chart/{id}','HomeController@indexs');
//permissions and Roles
Route::get('/user_index','UserController@index');
Route::get('/user_create','UserController@create');
Route::get('/users_create','UserController@create');
Route::post('/user_stores','UserController@storez');
Route::post('/user_store','UserController@store');
Route::post('/user_update/{id}','UserController@update');
Route::post('/user_destroy/{id}','UserController@destroy');
Route::post('/user_edit/{id}','UserController@edit');
Route::post('/user_show/{id}','UserController@show');

//permissions and Roles
Route::get('/permissions_index','PermissionController@index');
Route::get('/permission_create','PermissionController@create');
Route::post('/permissions_store','PermissionController@store');
Route::post('/permissions_update/{id}','PermissionController@update');
Route::post('/permissions_destroy/{id}','PermissionController@destroy');
Route::post('/permission_edit/{id}','PermissionController@edit');
Route::post('/permission_show/{id}','PermissionController@show');
Route::resource('/permissions', 'PermissionController');
//
