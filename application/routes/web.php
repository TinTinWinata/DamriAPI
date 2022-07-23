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
    return view('login');
});

Route::get('/bus', function () {
    return view('bus');
});
Route::get('/create-bus', function () {
    return view('create-bus');
});
Route::get('/create-driver', function () {
    return view('create-driver');
});
Route::get('/create-order', function () {
    return view('create-order');
});
Route::get('/driver', function () {
    return view('driver');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/update-bus/{id}', function ($id) {
    // dd($id);
    return view('update-bus', ["id" => $id]);
});
Route::get('/update-driver/{id}', function ($id) {
    return view('update-driver', ["id" => $id]);
});

Route::get('/update-order/{id}', function ($id) {
    return view('update-order', ["id" => $id]);
});
