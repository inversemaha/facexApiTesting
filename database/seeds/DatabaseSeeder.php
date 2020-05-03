<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
                'name' => "Motiur",
                'username' => "memotiur",
                'phone' => "01717849968",
                'email' => "memotiur@gmail.com",
                'designation' => "Admin",
                'usertype' => "1",
                'profile_pic' => 'user.jpg',
                'password' => Hash::make('123456'),
            ]
        );
    }
}
