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
    return view('donor.welcome');
});

Route::get('layout/layout', function(){
	return view ('layout.layout');
});

Route::get('layout/layout2', function(){
	return view ('layout.layout2');
});

Route::get('layout/layout1', function(){
	return view ('layout.layout1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Donor')->prefix('donor')->
name('donor.')->group(function (){
    Route::resource('details', 'DonorController', ['except'=> ['show', 'destroy']]);
});

Route::get('/donor/profile', function(){
	return view ('donor.profile');
});

Route::get('/donor/requests', function(){
	return view ('donor.request');
});

Route::get('/donor/blood_donation', function(){
	return view ('donor.blood_donation');
});

Route::get('/donor/history', function(){
	return view ('donor.history');
});

Route::namespace('Donor')->middleware(['auth'])->prefix('donor')->
name('donor.')->group(function (){
    Route::resource('donations', 'DonationController', ['except'=> ['show']]);
});

Route::namespace('Donor')->middleware(['auth'])->prefix('donor')->
name('donor.')->group(function (){
    Route::resource('donation_history', 'DonationHistoryController', ['except'=> ['show','edit','create','store','update','destroy']]);
});

Route::namespace('Donor')->middleware(['auth'])->prefix('donor')->
name('donor.')->group(function (){
    Route::resource('requests', 'RequestController', ['except'=> ['show','edit','create','store','update','destroy']]);
});

Route::namespace('Donor')->middleware(['auth'])->prefix('donor')->
name('donor.')->group(function (){

    Route::resource('responses', 'ResponseController', ['except'=> ['show','destroy']]);


});
Route::get('/donor/add_response/{id}', 'Donor\ResponseController@create2');
