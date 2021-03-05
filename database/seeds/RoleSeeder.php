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
            ['name'=>'Administrator', 'short_code'=> 'admin'],
            ['name'=> 'Project_Manager', 'short_code'=> 'pm'],
            ['name'=> 'Developer', 'short_code'=> 'developer'],
        ]);
    }
}
