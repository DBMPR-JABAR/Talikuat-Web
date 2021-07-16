<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\Backend\User;
use App\Models\Backend\UserDetail as UserDetail;
use Laravel\Fortify\Contracts\LogoutResponse;


use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {
                return redirect('/login')->with(['success'=>'you have successfully logged out ! ']);
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            $detail = UserDetail::where('user_id',$user->id)->first();
           
            if($detail){
                if ($user && Hash::check($request->password, $user->password)) {    
                    return $user;
                }
            }

        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        //login
        Fortify::loginView(function () {
        return view('auth.login');
        });

        //forgot
        Fortify::requestPasswordResetLinkView(function () {
        return view('auth.forgot-password');
        });

        //reset
        Fortify::resetPasswordView(function ($request) {
        return view('auth.reset-password', ['request' => $request]);
        });

        //confirm password
        Fortify::confirmPasswordView(function () {
        return view('auth.confirm-password');
        });

        //two factor authentication
        Fortify::twoFactorChallengeView(function () {
        return view('auth.two-factor-challenge');
        });
    }
}
