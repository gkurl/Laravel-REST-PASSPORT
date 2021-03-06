<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
            ['name' => 'Ryan Chenkie', 'email' => 'bob@gmail.com', 'password' => Hash::make('secret')],
            ['name' => 'Gagandeep Kurl', 'email' => 'gagandeep@hello.com', 'password' => Hash::make('secret')],
            ['name' => 'Ian Moore', 'email' => 'ian@maxtime.com', 'password' => Hash::make('secret')],
            ['name' => 'Adam Kukic', 'email' => 'adam@gmail.com', 'password' => Hash::make('secret')],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }

}
