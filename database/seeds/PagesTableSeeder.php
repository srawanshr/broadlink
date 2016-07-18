<?php

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Initial Page Seed Data
|--------------------------------------------------------------------------
|
| Here you may set the page details for various application
| pages. Don't worry, you can always edit these
| details within the application.
|
*/
class PagesTableSeeder extends Seeder
{
    /**
     * Run the Admin model database seed.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();

        DB::table('pages')->insert([
            /*
            |--------------------------------------------------------------------------
            | Home Page Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'home',
                'title'            => 'Home',
                'meta_description' => config('website.description'),
                'view'             => 'frontend.home.index',
                'is_primary'       => true,
                'created_by'       => App\Models\Admin::first()->id,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ],

            /*
            |--------------------------------------------------------------------------
            | Contact Page Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'contact',
                'title'            => 'Contact',
                'meta_description' => config('website.description'),
                'view'             => 'frontend.contact.index',
                'is_primary'       => true,
                'created_by'       => App\Models\Admin::first()->id,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ],

            /*
            |--------------------------------------------------------------------------
            | About Page Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'about',
                'title'            => 'About',
                'meta_description' => config('website.description'),
                'view'             => 'frontend.about.index',
                'is_primary'       => true,
                'created_by'       => App\Models\Admin::first()->id,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ],

            /*
            |--------------------------------------------------------------------------
            | Service Page Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'service',
                'title'            => 'Service',
                'meta_description' => config('website.description'),
                'view'             => 'frontend.service.index',
                'is_primary'       => true,
                'created_by'       => App\Models\Admin::first()->id,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ]
        ]);
    }
}
