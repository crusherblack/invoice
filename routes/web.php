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

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('product', 'ProductController')->except('show');
	Route::resource('customer', 'CustomerController')->except('show');

	Route::group(['prefix' => 'invoice'], function() {
	    Route::get('/new', 'InvoiceController@create')->name('invoice.create');
	    Route::post('/', 'InvoiceController@save')->name('invoice.store');
	    Route::get('/{id}', 'InvoiceController@edit')->name('invoice.edit');
	    Route::put('/{id}', 'InvoiceController@update')->name('invoice.update');
	    Route::get('/{id}/delete', 'InvoiceController@deleteProduct')->name('invoice.delete_product');
	    Route::get('/', 'InvoiceController@index')->name('invoice.index');
	    Route::delete('/{id}/delete', 'InvoiceController@destroy')->name('invoice.destroy');
	    Route::get('/{id}/print', 'InvoiceController@generateInvoice')->name('invoice.print');
	});
});

