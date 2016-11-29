<?php

namespace App\Providers;

use DB;
use Hash;
use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('old_password', function($attribute, $value, $parameters, $validator) {
            $table = $parameters[0];
            $id = $parameters[1];
            $inputPassword = $value;
            $hashedPassword = DB::table($table)->find($id)->password;
            if (Hash::check($inputPassword, $hashedPassword)) {
                return true;
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
