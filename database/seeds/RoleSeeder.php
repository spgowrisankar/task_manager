<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'Admin', 'short_code'=> 'admin'],
            ['name'=> 'Project_manager', 'short_code'=> 'project_manager'],
            ['name'=> 'Developer', 'short_code'=> 'developer'],
        ]);
    }
}
