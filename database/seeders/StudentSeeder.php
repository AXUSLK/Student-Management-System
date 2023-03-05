<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create(
            [
                'phone' => '0771234567',
                'address' => 'Matale',
                'course_id' => 1,
                'gender' => 5,
                'user_id' => 3,
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );

        Student::create(
            [
                'phone' => '0714567583',
                'address' => 'Kandy',
                'course_id' => 2,
                'gender' => 6,
                'user_id' => 4,
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );
    }
}
