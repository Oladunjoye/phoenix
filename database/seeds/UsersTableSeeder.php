<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = App\User::create([

        	'name' => 'shonubi joye',
        	'email' => 'shonubij@gmail.com',
        	'password' => bcrypt('bluesforlife') ,
            
        ]);

        App\Profile::create([

            'user_id' => $user->id,
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do . Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
            'avatar' => 'uploads/avatars/1.png'


        ]);

         $user = App\User::create([

            'name' => 'shonubi joye',
            'email' => 'shonubij@gmail.com',
            'password' => bcrypt('bluesforlife') ,
            
        ]);

    }

}

