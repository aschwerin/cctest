<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'   => 'superadmin',
            'display_name' => 'Super Administrator',
            'description'   => 'Admin is allowed to manage other admins.'
        ]);
        Role::create([
            'name'   => 'admin',
            'display_name' => 'User Administrator',
            'description'   => 'User is allowed to manage other users.'
        ]);

        Role::create([
            'name'   => 'dm',
            'display_name' => 'Dungeon Master',
            'description'   => 'User is allowed to view other player characters and create their own.'
        ]);

        Role::create([
            'name'   => 'player',
            'display_name' => 'Player',
            'description'   => 'User is allowed to view, create, update and delete their own character(s).'
        ]);

        Role::create([
            'name'   => 'subscriber',
            'display_name' => 'Subscriber',
            'description'   => 'User that has registered.'
        ]);
    }
}
