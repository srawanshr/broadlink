<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Service::truncate();

        DB::table('services')->insert([
            /*
            |--------------------------------------------------------------------------
            | Broadlink WiFi Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'broad-wifi',
                'name'             => 'Broad WiFi',
                'meta_description' => config('website.description'),
                'slogan'           => config('website.description'),
                'description_raw'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'description_html' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'is_active'        => true,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Broadlink Fiber Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'broad-fiber',
                'name'             => 'Broad Fiber',
                'meta_description' => config('website.description'),
                'slogan'           => config('website.description'),
                'description_raw'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'description_html' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'is_active'        => true,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | BroadTel Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'broadTel',
                'name'             => 'BroadTel',
                'meta_description' => config('website.description'),
                'slogan'           => config('website.description'),
                'description_raw'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'description_html' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'is_active'        => true,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | BroadTV Information
            |--------------------------------------------------------------------------
            */
            [
                'slug'             => 'broadTV',
                'name'             => 'BroadTV',
                'meta_description' => config('website.description'),
                'slogan'           => config('website.description'),
                'description_raw'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'description_html' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est dolorum animi repellat hic ex optio enim inventore quas nemo veniam, saepe aliquid porro voluptatibus iusto nihil assumenda? Illum, id cupiditate. In vel inventore ipsum repellendus. Numquam, ipsum, quos. Iure facere neque, quaerat voluptas minima expedita laboriosam deserunt quam! Asperiores, aspernatur!',
                'is_active'        => true,
                'created_at'       => Carbon\Carbon::now(),
                'updated_at'       => Carbon\Carbon::now()
            ],
        ]);
    }
}
