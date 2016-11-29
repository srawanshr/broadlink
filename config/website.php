<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadlink Meta Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the website meta tags for your application.
    | These will be used for web scraping and open graph tags
    | on sites such as Facebook and Twitter.
    |
    */
    'name' => 'Broadlink',
    'title' => 'Broadlink',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, earum.',
    'author' => 'Team',
    'url' => 'http://www.broadlink.com.np/',

    /*
    |--------------------------------------------------------------------------
    | Uploads Configuration
    |--------------------------------------------------------------------------
    |
    | Specify what type of storage you would like for your application. Just
    | as a reminder, your uploads directory MUST be writable by the
    | web server for the uploading to function properly.
    |
    | Supported: "local", "public"
    |
    */
    'uploads' => [
        'storage' => 'upload',
        'webpath' => '/uploads/',
    ],

];
