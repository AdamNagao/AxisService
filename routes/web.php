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
    return view('pages.welcome');
});
Route::get('/public', function () {
    return view('pages.welcome');
});
Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/dashboard', function () {
    return view('pages.home');
});
Route::get('/order', function () {
    return view('pages.order');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/orders','OrderController@index');   //list out orders

Route::post('/createorder','OrderController@store'); //make an order

Route::get('/viewJobs','OrderController@viewJobs');

Route::put('/acceptJob/{id}','OrderController@update'); //pro has accepted a job

Route::get('/selectPro/{proId}/{orderId}','OrderController@selectPro'); //the user has selected a pro for the job(Pro has id $id)

Route::get('/completeJob/{id}','OrderController@completeJob'); //pro has completed a job

Route::get('/profile/{id}','ReviewsController@indexProfile'); //view the user with ID profile

Route::post('/completeReview/{id}', 'ReviewsController@store'); //add a review to the database


Route::get('/quote/{orderId}', function ($orderId) { //create a new product/service
    return view('pages.quote', compact('orderId'));
});

Route::post('/createQuote/{orderId}','ProductController@create');

//Route::get('/viewQuote/{orderId}','ProductController@index');    //view the quote

// Product Routes


Route::get('/viewQuote/{orderId}/{proId}', [ 
    'uses' => 'ProductController@index',
    'as' => 'index',
    'middleware' => 'auth'
]);

// Order Routes
Route::get('/admin', [
    'uses' => 'OrderController@getAllOrders',
    'as' => 'admin',
    'middleware' => 'admin'
]);
 
Route::post('/pay/{product}/{orderId}', [
    'uses' => 'OrderController@postPayWithStripe',
    'as' => 'pay',
    'middleware' => 'auth'
]);
 
Route::post('/store', [
    'uses' => 'OrderController@postPayWithStripe',
    'as' => 'store',
    'middleware' => 'auth'
]);

