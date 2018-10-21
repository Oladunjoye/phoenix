<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Setting::create([

        	'site_name' => "Laravel's Blog",
        	'address' => 'Lagos, Nigeria',
        	'contact_number' => '08159614339',
        	'contact_email' => 'info@laravelblog.com'



        ]);

    }
}
