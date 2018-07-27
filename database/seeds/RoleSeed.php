<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        // Assign Admin User
        $userAdmin = User::where('ic', '01')->first();
        $userAdmin->attachRole($admin);
    }
}
