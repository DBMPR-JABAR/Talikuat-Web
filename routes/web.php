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
            Route::get('/',[MasterKontraktorController::class,'index'])->name('masterkontraktor.index');
            Route::get('/detail/{id}',[MasterKontraktorController::class,'show'])->name('show.masterkontraktor');
            Route::get('/create',[MasterKontraktorController::class,'create'])->name('create.masterkontraktor');
            Route::post('/store',[MasterKontraktorController::class,'store'])->name('store.masterkontraktor');
            Route::get('/edit/{id}',[MasterKontraktorController::class,'edit'])->name('edit.masterkontraktor');
            Route::put('/update/{id}',[MasterKontraktorController::class,'update'])->name('update.masterkontraktor');
            Route::get('/trash',[MasterKontraktorController::class,'trash'])->name('trash.masterkontraktor');
            Route::get('/trash/{desc}/{id}',[MasterKontraktorController::class,'move_to_trash']);
        });
        route::prefix('/master_konsultan')->group(function(){
            Route::get('/',[MasterKonsultan::class,'index'])->name('masterkonsultan.index');
            Route::get('/detail/{id}',[MasterKonsultan::class,'show'])->name('show.masterkonsultan');
            Route::get('/create',[MasterKonsultan::class,'create'])->name('create.masterkonsultan');

        });
        route::prefix('/master_ppk')->group(function(){
            Route::get('/',[MasterPpkController::class,'index'])->name('masterppk.index');
            Route::get('/detail/{id}',[MasterPpkController::class,'show'])->name('show.masterppk');

            Route::get('/create',[MasterPpkController::class,'create'])->name('create.masterppk');
            Route::post('/store',[MasterPpkController::class,'store'])->name('store.masterppk');
            Route::get('/edit/{id}',[MasterPpkController::class,'edit'])->name('edit.masterppk');
            Route::put('/update/{id}',[MasterPpkController::class,'update'])->name('update.masterppk');
            Route::get('/trash',[MasterPpkController::class,'trash'])->name('trash.masterppk');
            Route::get('/trash/{desc}/{id}',[MasterPpkController::class,'move_to_trash']);

        });

    });
    });
});




Route::get('/email', function () {
    return view('email_request');
});
