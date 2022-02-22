<?php

namespace App\Http\Controllers\Backend\admin;

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
Route::get('getCity', [DropdownAddressController::class, 'getCity']);
Route::get('getRuasByUptd', [DropdownDataController::class, 'getRuasByUptd']);
Route::get('getPpkByUptd', [DropdownDataController::class, 'getPpkByUptd']);
Route::get('getGsByKontraktor', [DropdownDataController::class, 'getGsByKontraktor']);
Route::get('getFtByKonsultan', [DropdownDataController::class, 'getFtByKonsultan']);


Route::prefix('admin')->group(function () {
    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => 'account.verified'], function () {

            //route dashboard
            Route::get('/dashboard', [DashboardControllers::class, 'index'])->name('admin.dashboard.index');
            Route::get('/', [DashboardControllers::class, 'index'])->name('admin.home');
            Route::get('/user_admin', [MasterAdminController::class, 'index'])->name('user_admin.index');
            Route::post('/user_admin/store', [MasterAdminController::class, 'store'])->name('store.user_admin');
            Route::get('/user_admin/trash', [MasterAdminController::class, 'trash'])->name('user_admin.trash');

            Route::get('/user_mk', [MasterMkController::class, 'index_user'])->name('user_mk.index');
            Route::post('/user_mk/store', [MasterMkController::class, 'store_user'])->name('store.user_mk');
            Route::get('/role&permission', [RoleController::class, 'index'])->name('role.index');

            Route::prefix('role')->group(function () {
                Route::get('/create', [RoleController::class, 'create'])->name('role.create');
                Route::post('/store', [RoleController::class, 'store'])->name('store.role');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
                Route::put('/update/{id}', [RoleController::class, 'update'])->name('update.role');
                Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');
            });
            Route::prefix('permission')->group(function () {
            });
            Route::prefix('feature')->group(function () {
                Route::post('store', [FeatureController::class, 'store'])->name('store.feature');
            });
            Route::prefix('feature_category')->group(function () {
                Route::post('store', [FeatureCategoryController::class, 'store'])->name('store.feature_category');
            });

            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('user.index');
                Route::post('store', [UserController::class, 'store'])->name('store.user');
                Route::post('store/kons/{id}', [UserController::class, 'store_konsultan'])->name('store.user.kons');
                Route::post('store/kont/{id}', [UserController::class, 'store_kontraktor'])->name('store.user.kont');

                Route::get('/trash', [UserController::class, 'trash'])->name('user.trash');
                Route::get('/trash/{desc}/{id}', [UserController::class, 'move_to_trash']);

                Route::get('/{id}', [UserController::class, 'show'])->name('show.user');
                Route::get('verified/{id}', [UserController::class, 'show'])->name('verified.user');
                Route::post('verified/{id}', [UserController::class, 'verified_account'])->name('verified.user');

                Route::get('edit/{desc}/{id}', [UserController::class, 'edit'])->name('edit.user');
                Route::post('edit/{desc}/{id}', [UserController::class, 'update'])->name('update.user');
                Route::prefix('field_team')->group(function () {
                    Route::get('/index', [UserController::class, 'index_ft'])->name('user.ft.index');
                    Route::get('/trash', [MasterKonsultanController::class, 'trash_ft'])->name('user.ft.trash');
                    Route::get('/{id}', [UserController::class, 'show_ft'])->name('show.user.ft');


                    Route::get('verified/{id}', [UserController::class, 'show_ft'])->name('verified.user.ft');
                    Route::post('verified/{id}', [VerifiedController::class, 'verified_ft'])->name('verified.user.ft.store');
                });
                Route::prefix('general_superintendent')->group(function () {
                    Route::get('/index', [UserController::class, 'index_gs'])->name('user.gs.index');
                    Route::get('/trash', [MasterKontraktorController::class, 'trash_gs'])->name('user.gs.trash');
                    Route::get('/{id}', [UserController::class, 'show_gs'])->name('show.user.gs');

                    Route::get('verified/{id}', [UserController::class, 'show_gs'])->name('verified.user.gs');
                    Route::post('verified/{id}', [VerifiedController::class, 'verified_gs'])->name('verified.user.gs.store');
                });
            });

            //route user profles
            Route::prefix('profile')->group(function () {
                Route::get('/{id}', [UserController::class, 'show'])->name('profile');
                Route::post('/account/{id}', [UserController::class, 'updateaccount']);
                Route::get('/{desc}/{id}', [UserController::class, 'edit'])->name('editProfile');
            });

            route::prefix('/master_kontraktor')->group(function () {
                Route::get('/', [MasterKontraktorController::class, 'index'])->name('masterkontraktor.index');
                Route::get('/detail/{id}', [MasterKontraktorController::class, 'show'])->name('show.masterkontraktor');
                Route::get('/create', [MasterKontraktorController::class, 'create'])->name('create.masterkontraktor');
                Route::post('/store', [MasterKontraktorController::class, 'store'])->name('store.masterkontraktor');
                Route::get('/edit/{id}', [MasterKontraktorController::class, 'edit'])->name('edit.masterkontraktor');
                Route::put('/update/{id}', [MasterKontraktorController::class, 'update'])->name('update.masterkontraktor');
                Route::post('/update_gs/{id}', [MasterKontraktorController::class, 'update_gs'])->name('update.masterkontraktorgs');
                Route::post('/store_gs', [MasterKontraktorController::class, 'store_gs'])->name('store.masterkontraktorgs');
                Route::get('/trash_gs/{desc}/{id}', [MasterKontraktorController::class, 'move_to_trash_gs']);

                Route::get('/trash', [MasterKontraktorController::class, 'trash'])->name('trash.masterkontraktor');
                Route::get('/trash/{desc}/{id}', [MasterKontraktorController::class, 'move_to_trash']);
            });
            route::prefix('/master_konsultan')->group(function () {
                Route::get('/', [MasterKonsultanController::class, 'index'])->name('masterkonsultan.index');
                Route::get('/detail/{id}', [MasterKonsultanController::class, 'show'])->name('show.masterkonsultan');
                Route::get('/create', [MasterKonsultanController::class, 'create'])->name('create.masterkonsultan');
                Route::post('/store', [MasterKonsultanController::class, 'store'])->name('store.masterkonsultan');
                Route::get('/edit/{id}', [MasterKonsultanController::class, 'edit'])->name('edit.masterkonsultan');
                Route::put('/update/{id}', [MasterKonsultanController::class, 'update'])->name('update.masterkonsultan');
                Route::post('/update_ft/{id}', [MasterKonsultanController::class, 'update_ft'])->name('update.masterkonsultanft');
                Route::post('/store_ft/{id}', [MasterKonsultanController::class, 'store_ft'])->name('store.masterkonsultanft');
                Route::post('/store_ft_second', [MasterKonsultanController::class, 'store_ft_second'])->name('store.masterkonsultanft.second');

                Route::get('/trash_ft/{desc}/{id}', [MasterKonsultanController::class, 'move_to_trash_ft']);

                Route::get('/trash', [MasterKonsultanController::class, 'trash'])->name('trash.masterkonsultan');
                Route::get('/trash/{desc}/{id}', [MasterKonsultanController::class, 'move_to_trash']);
            });
            route::prefix('/master_mk')->group(function () {
                Route::get('/', [MasterMkController::class, 'index'])->name('mastermk.index');
                Route::get('/detail/{id}', [MasterMkController::class, 'show'])->name('show.mastermk');
                Route::get('/create', [MasterMkController::class, 'create'])->name('create.mastermk');
                Route::post('/store', [MasterMkController::class, 'store'])->name('store.mastermk');
                Route::get('/edit/{id}', [MasterMkController::class, 'edit'])->name('edit.mastermk');
                Route::put('/update/{id}', [MasterMkController::class, 'update'])->name('update.mastermk');

                Route::post('/user/store/{id}', [MasterMkController::class, 'store_user'])->name('store.user.mk');

                Route::get('/trash_ft/{desc}/{id}', [MasterMkController::class, 'move_to_trash_ft']);

                Route::get('/trash', [MasterMkController::class, 'trash'])->name('trash.mastermk');
                Route::get('/trash/{desc}/{id}', [MasterMkController::class, 'move_to_trash']);
            });
            route::prefix('/master_ppk')->group(function () {
                Route::get('/', [MasterPpkController::class, 'index'])->name('masterppk.index');
                Route::get('/detail/{id}', [MasterPpkController::class, 'show'])->name('show.masterppk');
                Route::get('/create', [MasterPpkController::class, 'create'])->name('create.masterppk');
                Route::post('/store', [MasterPpkController::class, 'store'])->name('store.masterppk');
                Route::get('/edit/{id}', [MasterPpkController::class, 'edit'])->name('edit.masterppk');
                Route::put('/update/{id}', [MasterPpkController::class, 'update'])->name('update.masterppk');
                Route::get('/trash', [MasterPpkController::class, 'trash'])->name('trash.masterppk');
                Route::get('/trash/{desc}/{id}', [MasterPpkController::class, 'move_to_trash']);
            });
            route::prefix('/master_jenis_pekerjaan')->group(function () {
                Route::get('/', [MasterJenisPekerjaanController::class, 'index'])->name('masterjenispekerjaan.index');
                Route::get('/detail/{id}', [MasterJenisPekerjaanController::class, 'show'])->name('show.masterjenispekerjaan');
                Route::get('/create', [MasterJenisPekerjaanController::class, 'create'])->name('create.masterjenispekerjaan');
                Route::post('/store', [MasterJenisPekerjaanController::class, 'store'])->name('store.masterjenispekerjaan');
                Route::get('/edit/{id}', [MasterJenisPekerjaanController::class, 'edit'])->name('edit.masterjenispekerjaan');
                Route::put('/update/{id}', [MasterJenisPekerjaanController::class, 'update'])->name('update.masterjenispekerjaan');
                Route::get('/trash', [MasterJenisPekerjaanController::class, 'trash'])->name('trash.masterjenispekerjaan');
                Route::get('/trash/{desc}/{id}', [MasterJenisPekerjaanController::class, 'move_to_trash']);
            });
            route::prefix('/data_umum')->group(function () {
                Route::get('/', [DataUmumController::class, 'index'])->name('dataumum.index');
                Route::get('/detail/{id}', [DataUmumController::class, 'show'])->name('show.dataumum');
                Route::get('/create', [DataUmumController::class, 'create'])->name('create.dataumum');
                Route::post('/store', [DataUmumController::class, 'store'])->name('store.dataumum');
                Route::get('/edit/{id}', [DataUmumController::class, 'edit'])->name('edit.dataumum');
                Route::put('/update/{id}', [DataUmumController::class, 'update'])->name('update.dataumum');
                Route::get('/trash', [DataUmumController::class, 'trash'])->name('trash.dataumum');
                Route::get('/trash/{desc}/{id}', [DataUmumController::class, 'move_to_trash']);
                Route::get('/addendum/{id}', [DataUmumAddendumControllers::class, 'create'])->name('create.addendum');
            });
            Route::get('activity/{id}', [LogControllers::class, 'getLogUser'])->name('log.user.index');
            Route::prefix('log')->group(function () {
                Route::get('/', [LogControllers::class, 'index'])->name('log.index');
            });
            Route::resource('jadual', JadualControllers::class);
            Route::get('/jadual/create/{id}', [JadualControllers::class, 'create'])->name('jadual.create');
            Route::get('/delete/file/{id}', [JadualControllers::class, 'deleteFile'])->name('jadual.delete.file');
            Route::resource('request', RequestControllers::class);
            Route::get('/request/create/{id}', [RequestControllers::class, 'create'])->name('request.create');
        });
    });
});

Route::get('/pusat-unduhan', [PusatUnduhanControllers::class, 'index'])->name('pusat_unduhan.index');


Route::get('/email', function () {
    return view('email_memo');
});
