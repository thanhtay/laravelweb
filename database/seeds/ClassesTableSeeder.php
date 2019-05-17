<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'name' => '1',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '2',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '3',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '4',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '5',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '6',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '7',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '8',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '9',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '10',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '11',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => '12',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('classes')->insert([
            'name' => 'All',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
