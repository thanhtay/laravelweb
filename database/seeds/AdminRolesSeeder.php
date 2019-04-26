<?php

use Illuminate\Database\Seeder;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_roles')->insert([
            'name' => 'Super Administrator',
            'level' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('admin_roles')->insert([
            'name' => 'Admin',
            'level' => 2,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
