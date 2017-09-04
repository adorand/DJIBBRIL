<?php

use Illuminate\Database\Seeder;
use App\Authority\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // !!! All existing roles are deleted !!!
        DB::table('role_surface')->truncate();
        DB::table('roles')->truncate();
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin = Role::create(['name' => 'vendor']);

    }
}
