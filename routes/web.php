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
Route::get('/', 'BerandaController@index');
Route::get('/product', 'BerandaController@product');
Route::get('/category/{slug}','BerandaController@productbycategory')->name('category.product');
Route::get('/penjual/{id}','BerandaController@productbypenjual');
Route::get('product/detail/{slug}','BerandaController@detail');
// 
Route::get('penjual','BerandaController@penjual');
Route::get('auth/register','AuthController@register');
Route::post('auth/register','AuthController@store')->name('home.register');
Route::get('verfikasi/register/{token}','AuthController@verif');
Route::post('auth/login','AuthController@login');
//cart
Route::post('/cart','CartController@index');
Route::get('keranjang','CartController@keranjang');
Route::post('cart/update','CartController@update');
Route::get('cart/delete/{rowid}','CartController@delete');
Route::get('cart/formulir','CartController@formulir');
Route::post('cart/transaction','CartController@transaction');
Route::get('cart/myorder','CartController@myorder');
Route::get('cart/detail/{code}','CartController@detail');
Route::get('myproduct','CartController@product')->middleware('oauth:supplier');
Route::get('addproduct','CartController@addproduct')->middleware('oauth:supplier');
Route::post('addproduct','CartController@saveproduct')->middleware('oauth:supplier');
Route::get('editproduct/{id}','CartController@editproduct')->middleware('oauth:supplier');
Route::post('editproduct','CartController@updateproduct')->middleware('oauth:supplier');
Route::get('deleteproduct/{id}','CartController@deleteproduct')->middleware('oauth:supplier');
Route::get('myprofil','BerandaController@myprofil');
Route::post('updateprofil','BerandaController@updateprofil');
Route::get('logout','BerandaController@logout');
Auth::routes();
Route::get('citybyid/{id}',function($id){
	return city($id);
});





// Route::prefix('admin')->group(function(){
Route::prefix('admin')->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('media','HomeController@media')->name('media.index');
	Route::get('dashboard','HomeController@index');
	// Route::get('category','CategoryController@index');
	// Route::post('category','CategoryController@store')->name('admin.category');

	//Category
	Route::resource('category','CategoryController');

	//product
	Route::resource('product','ProductController');
	Route::get('transaction','TransactionController@index')->name('transaction.index');

	//Transaction
	Route::get('transaction/{code}/{status}','TransactionController@status');
	Route::get('transaction/{code}/detail/data','TransactionController@detail');
	Route::get('transaction/{code}/detail/data/cetak','TransactionController@cetakpdf');

	//users
	Route::get('user','UserController@index')->name('admin.user');
	Route::get('user/status/{id}','UserController@changestatus');
	Route::get('user/add','UserController@create')->name('admin.user.create');
	Route::post('user/add','UserController@store')->name('admin.user.store');
	Route::get('user/edit/{id}','UserController@edit');
	Route::post('user/update','UserController@update');
	Route::get('user/delete/{id}','UserController@delete');
});
	

