<?php

use App\User;

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
        User::truncate();

        $user = new User;

        $user->name = 'Elias';
        $user->email = 'eliaskemasda@gmail.com';
        $user->password = bcrypt('123123');
        $user->save();

    }
}
