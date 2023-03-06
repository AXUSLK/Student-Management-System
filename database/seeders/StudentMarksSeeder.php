<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentMarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_subject')->insert(array(
            // 01
            array(
                'student_id' => 1200,
                'subject_id' => 1,
                'mark' => 80,
            ),
            array(
                'student_id' => 1200,
                'subject_id' => 2,
                'mark' => 75,
            ),
            array(
                'student_id' => 1200,
                'subject_id' => 4,
                'mark' => 65,
            ),

            //02
            array(
                'student_id' => 1201,
                'subject_id' => 1,
                'mark' => 75,
            ),
            array(
                'student_id' => 1201,
                'subject_id' => 2,
                'mark' => 85,
            ),
            array(
                'student_id' => 1201,
                'subject_id' => 4,
                'mark' => 65,
            ),

            //03
            array(
                'student_id' => 1202,
                'subject_id' => 1,
                'mark' => 65,
            ),
            array(
                'student_id' => 1202,
                'subject_id' => 2,
                'mark' => 60,
            ),
            array(
                'student_id' => 1202,
                'subject_id' => 4,
                'mark' => 80,
            ),
        ));
    }
}
