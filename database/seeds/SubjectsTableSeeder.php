<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Toán',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Lý',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Hóa',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sinh',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Anh Văn',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
