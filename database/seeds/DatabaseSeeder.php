<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(AdminsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
