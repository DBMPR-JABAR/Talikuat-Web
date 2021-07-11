<?php

namespace App\Http\Controllers\Backend;
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
    return view('auth.login');
});


// DASHBOARD
// Route::get('/dashboard',[DashboardControllers::class,'index'])->name('dashboard');

Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/dashboard', [DashboardControllers::class, 'index'])->name('admin.dashboard.index');
        
        //route dashboard
    });
});




Route::get('/email', function () {
    return view('email_request');
});
