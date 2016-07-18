<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Initial Admin Seed Data
|--------------------------------------------------------------------------
|
| Here you may set the user information details for the application
| administrator. Don't worry, you can always edit these
| details within the application.
|
*/
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the Admin model database seed.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        DB::table('admins')->insert([
            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */
            'slug'          => str_slug(config('website.title')),
            'username'      => str_slug(config('website.title')),
            'first_name'    => config('website.title'),
            'last_name'     => 'Administrator',

            /*
            |--------------------------------------------------------------------------
            | Contact Information
            |--------------------------------------------------------------------------
            */
            'phone'         => '0001110000',
            'email'         => 'admin@' . seoUrl(config('website.title')) . '.com',
            'address'       => 'Patan Dhoka',

            /*
            |--------------------------------------------------------------------------
            | Misc Information
            |--------------------------------------------------------------------------
            */
            'password'      => bcrypt('password'),
            'is_active'  => true,

            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
    }
}
