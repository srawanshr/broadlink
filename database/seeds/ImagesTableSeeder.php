<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $popUp = \App\Models\Setting::whereSlug('pop-up')->first();

        $group = \App\Models\Group::first();

        $services = \App\Models\Service::all();

        foreach ($services as $service)
        {
            $service->icon()->create([
                'name' => $service->slug,
                'path' => 'images/icons/service-icons/'.$service->slug.'.png',
                'size' => File::size(public_path('images\icons\service-icons\\'.$service->slug.'.png')),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);
        }

        $popUp->image()->create([
            'name' => $popUp->slug,
            'path' => 'images/'.$popUp->slug.'.jpg',
            'size' => File::size(public_path('images\\'.$popUp->slug.'.jpg')),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        $group->image()->create([
            'name' => $group->slug,
            'path' => 'images/'.$group->slug.'.png',
            'size' => File::size(public_path('images\\'.$group->slug.'.png')),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
