<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();

        DB::table('users')->insert([
            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */
            'slug'          => str_slug('luke-skywalker'),
            'username'      => str_slug('skywalker'),
            'first_name'    => 'Luke',
            'last_name'     => 'Skywalker',

            /*
            |--------------------------------------------------------------------------
            | Contact Information
            |--------------------------------------------------------------------------
            */
            'phone'         => '01-555-55-55',
            'email'         => 'luke@' . seoUrl(config('website.title')) . '.com',
            'address'       => 'Tatooine',

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
