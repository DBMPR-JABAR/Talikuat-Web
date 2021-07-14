<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Province as Province;
use App\Models\Backend\City as City;
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
            $provinces = Province::pluck('name','id');
            $cities = City::pluck('name','id');

            $view->with(['provinces'=> $provinces, 'cities'=>$cities]);
        });
    }
}
