<?php

use App\Http\Controllers\Backend\DashboardControllers;
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
    return view('auth.index');
});


// DASHBOARD
Route::get('/dashboard',[DashboardControllers::class,'index'])->name('dashboard');






Route::get('/email', function () {
    return view('email_request');
});
