<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name'=>'Manage Users', 'short_code'=> 'manage_users'],
            ['name'=> 'Manage Role', 'short_code'=> 'manage_role'],
            ['name'=> 'Manage Permission', 'short_code'=> 'manage_permission'],
        ]);
    }
}
