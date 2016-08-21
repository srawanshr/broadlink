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
                'meta_description' => 'Broadlink news and announcements',
            ],
        ]);
    }
}
