<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\admin\MasterKonsultan;
use App\Http\Controllers\Backend\admin\MasterPpk;
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
    Route::group(['middleware' => 'account.verified'], function() {

        //route dashboard
        Route::get('/dashboard', [DashboardControllers::class, 'index'])->name('admin.dashboard.index');
        Route::get('/', [DashboardControllers::class, 'index'])->name('admin.home');
  
        Route::prefix('user')->group(function (){
            Route::get('/',[UserController::class,'index'])->name('user.index');
            Route::post('store',[UserController::class,'store'])->name('store.user');
            Route::get('/trash',[UserController::class,'trash'])->name('user.trash');
            Route::get('/trash/{desc}/{id}',[UserController::class,'move_to_trash']);

            Route::get('/{id}',[UserController::class,'show'])->name('show.user');
            Route::get('verified/{id}',[UserController::class,'show'])->name('verified.user');
            Route::post('verified/{id}',[UserController::class,'verified_account'])->name('verified.user');

            Route::get('edit/{desc}/{id}',[UserController::class,'edit'])->name('edit.user');
            Route::post('edit/{desc}/{id}',[UserController::class,'update'])->name('update.user');
            
        });
        
        //route user profles
        Route::prefix('profile')->group(function (){
            Route::get('/{id}',[UserController::class,'show'])->name('profile');
            Route::post('/account/{id}', [UserController::class,'updateaccount']);
            Route::get('/{desc}/{id}',[UserController::class,'edit'])->name('editProfile');
        });

        route::prefix('/master_kontraktor')->group(function(){
            Route::get('/',[MasterKontraktor::class,'index'])->name('masterkontraktor.index');
            Route::get('/{id}',[MasterKontraktor::class,'show'])->name('show.masterkontraktor');
        });
        route::prefix('/master_konsultan')->group(function(){
            Route::get('/',[MasterKonsultan::class,'index'])->name('masterkonsultan.index');
            Route::get('/{id}',[MasterKonsultan::class,'show'])->name('show.masterkonsultan');
        });
        route::prefix('/master_ppk')->group(function(){
            Route::get('/',[MasterPpk::class,'index'])->name('masterppk.index');
            Route::get('/{id}',[MasterPpk::class,'show'])->name('show.masterppk');
        });

    });
    });
});




Route::get('/email', function () {
    return view('email_request');
});
