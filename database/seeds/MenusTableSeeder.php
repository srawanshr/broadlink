<?php

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Initial Settings Seed Data
|--------------------------------------------------------------------------
|
| Here you may set the menu details for application menu.
| Don't worry, you can always edit these details within the application.
|
*/

class MenusTableSeeder extends Seeder {

    /**
     * Run the Admin model database seed.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();

        foreach (Page::all() as $key => $page)
        {
            Menu::firstOrCreate([
                'page_id' => $page->id,
                'title'   => $page->title,
                'order'   => $key,
            ]);
        }
    }
}
