<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        DB::table('tags')->insert([
            [
                'tag'              => 'news',
                'title'            => 'News',
                'icon'             => '&#xE0E0;',
                'meta_description' => 'Broadlink news and announcements',
            ],
            [
                'tag'              => 'events',
                'title'            => 'Events',
                'icon'             => '&#xE878;',
                'meta_description' => 'Broadlink news and announcements',
            ],
            [
                'tag'              => 'announcements',
                'title'            => 'Announcements',
                'icon'             => '&#xE7F7;',
                'meta_description' => 'Broadlink news and announcements',
            ],
            [
                'tag'              => 'blog',
                'title'            => 'Blog',
                'icon'             => '&#xE060;',
                'meta_description' => 'Broadlink news and announcements',
            ]
        ]);
    }
}
