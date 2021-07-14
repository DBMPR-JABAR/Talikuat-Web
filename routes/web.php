<?php

namespace App\Http\Controllers\Backend\Admin;
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
        //route dashboard
        Route::get('/dashboard', [DashboardControllers::class, 'index'])->name('admin.dashboard.index');
        Route::get('/', [DashboardControllers::class, 'index'])->name('admin.home');

        Route::get('/masterkontraktor',[MasterKontraktor::class,'index'])->name('masterkontraktor');
        
        Route::prefix('user')->group(function (){
            Route::get('/{id}',[UserController::class,'show'])->name('profile');
            Route::post('edit/{desc}/{id}',[UserController::class,'update'])->name('edit.user');
        });
        
        //route user profles
        Route::prefix('profile')->group(function (){
            Route::get('/{id}',[UserController::class,'show'])->name('profile');
            Route::post('/account/{id}', [UserController::class,'updateaccount']);
            Route::get('/{desc}/{id}',[UserController::class,'edit'])->name('editProfile');
        });


    });
});




Route::get('/email', function () {
    return view('email_request');
});
