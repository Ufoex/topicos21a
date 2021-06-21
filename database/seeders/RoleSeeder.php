<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        $user = User::create(['name'=> 'uriel',
        'email' => 'masterllamas@hotmail.com',
        'password' => bcrypt('hola1234')]);

        $user2 = User::create(['name'=> 'miriam',
        'email' => 'miriam@hotmail.com',
        'password' => bcrypt('hola1234')]);

        $user->assignRole('Admin');
        $user2->assignRole('User');
    }
}
