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

Route::get('/addclub', 'Club@index');

Route::post('/getsports', 'Club@sports');
Route::post('/getfee', 'Club@getfee');
Route::post('/postclub', 'Club@saveclub');
Route::post('/getclubdetail', 'Club@getusesbyclub');