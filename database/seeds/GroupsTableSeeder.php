<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();

        DB::table('groups')->insert([
            [
                'slug'       => 'internet',
                'name'      => 'Internet',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
        ]);

        $group = Group::whereSlug('internet')->first();

        $wifi = \App\Models\Service::whereSlug('broad-wifi')->first()->id;

        $fiber = \App\Models\Service::whereSlug('broad-fiber')->first()->id;

        $group->services()->sync([$wifi, $fiber]);
    }
}
