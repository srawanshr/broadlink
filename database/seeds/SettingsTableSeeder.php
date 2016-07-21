<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Initial Settings Seed Data
|--------------------------------------------------------------------------
|
| Here you may set the page details for various application
| pages. Don't worry, you can always edit these
| details within the application.
|
*/

class SettingsTableSeeder extends Seeder {

    /**
     * Run the Admin model database seed.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        DB::table('settings')->insert([
            [
                'slug'  => 'address',
                'name'  => 'Address',
                'value' => 'BroadLink Network and Communication Pvt. Ltd.|Indreni Heights, Sanepa (RingRoad)|Lalitpur, Nepal',
            ],
            [
                'slug'  => 'phone',
                'name'  => 'Phone',
                'value' => '+977 9801453020',
            ],
            [
                'slug'  => 'broad-tel-messenger-users',
                'name'  => 'BroadTel Messenger Users',
                'value' => '+01-9801453020 ',
            ],
            [
                'slug'  => 'fax',
                'name'  => 'Fax',
                'value' => '+977 1 5553023',
            ],
            [
                'slug'  => 'email',
                'name'  => 'Email',
                'value' => 'info@broadlink.com.np'
            ],
            [
                'slug'  => 'gpo',
                'name'  => 'GPO',
                'value' => '8975‚ EPC: 413'
            ],
            [
                'slug'  => 'bh-sales',
                'name'  => 'Business Hours Sales',
                'value' => 'Sun – Fri: 9:30 am - 5:30 pm|Sat : Closed'
            ],
            [
                'slug'  => 'bh-customer-care',
                'name'  => 'Business Hours Customer Care',
                'value' => 'Sun – Fri: 9:30 am - 5:30 pm|Sat : Closed'
            ],
            [
                'slug'  => 'bh-technical-support',
                'name'  => 'Business Hours Technical Support',
                'value' => '7 days a week 8 am to 8 pm'
            ],
            [
                'slug'  => 'phone-technical-support',
                'name'  => 'Phone Technical Support',
                'value' => '9801453020'
            ]
        ]);
    }
}
