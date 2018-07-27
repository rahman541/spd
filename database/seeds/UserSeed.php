<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin user
        $admin = new User;
        $admin->name = 'Admin';
        $admin->ic = '01';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('123');
        $admin->save();

        // User
        $user = new User;
        $user->name = 'User';
        $user->ic = '02';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('123');
        $user->save();
    }
}
