<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'name' => 'Principal',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('user_roles')->insert([
            'name' => 'Admin',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
