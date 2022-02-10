<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Province as Province;
use App\Models\Backend\City as City;
use App\Models\Backend\Uptd;
use App\Models\Backend\User;
use App\Models\Backend\MasterKontraktor;
use App\Models\Backend\MasterKonsultan;
use App\Models\Backend\MasterKonsultanFt as FieldTeam;
use View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;





class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        
        View::composer('*', function ($view) {
            if (Auth::user()) {
                $user_policy = User::find(Auth::user()->id);
            }

            $view->with(['user_policy'=> $user_policy]);
        });
        View::composer('*', function ($view) {
            $provinces = Province::pluck('name','id');
            $cities = City::pluck('name','id');

            $view->with(['provinces'=> $provinces, 'cities'=>$cities]);
        });
        View::composer('*', function ($view) {
            $uptd_list = Uptd::whereBetween('id', [1, 6])->get();
            $kontraktors = MasterKontraktor::where('is_delete',null)->get();
            $konsultans = MasterKonsultan::where('is_delete',null)->get();

            
            $view->with(['uptd_list'=> $uptd_list, 'kontraktors'=>$kontraktors, 'konsultans'=>$konsultans]);
        });
    }
}
