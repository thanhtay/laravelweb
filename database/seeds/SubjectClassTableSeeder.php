<?php

use Illuminate\Database\Seeder;

class SubjectClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Head subject
        DB::table('subjects_classes')->insert(
            [
                [
                    'id_class' => 13,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 13,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 13,
                    'id_subject' => 3,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 13,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 13,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
            ]
        );

        // Toan
        DB::table('subjects_classes')->insert(
            [
                [
                    'id_class' => 1,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 2,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 3,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 4,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 5,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 6,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 7,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 8,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 9,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 10,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 11,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 12,
                    'id_subject' => 1,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
            ]
        );

        // Anh van
        DB::table('subjects_classes')->insert(
            [
                [
                    'id_class' => 3,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 4,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 5,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 6,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 7,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 8,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 9,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 10,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 11,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 12,
                    'id_subject' => 5,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
            ]
        );

        // Ly
        DB::table('subjects_classes')->insert(
            [
                [
                    'id_class' => 6,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 7,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 8,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 9,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 10,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 11,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 12,
                    'id_subject' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
            ]
        );
        // Hoa
        DB::table('subjects_classes')->insert(
            [
                [
                    'id_class' => 8,
                    'id_subject' => 3,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 9,
                    'id_subject' => 3,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 10,
                    'id_subject' => 3,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 11,
                    'id_subject' => 3,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 12,
                    'id_subject' => 3,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
            ]
        );
        // Hoa
        DB::table('subjects_classes')->insert(
            [
                [
                    'id_class' => 6,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 7,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 8,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 9,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 10,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 11,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
                [
                    'id_class' => 12,
                    'id_subject' => 4,
                    'created_at' => time(),
                    'updated_at' => time(),
                ],
            ]
        );
    }
}