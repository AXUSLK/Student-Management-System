<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create(
            [
                'id' => '1',
                'name' => 'Maths',
                'pass_mark' => 65,
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );

        Subject::create(
            [
                'id' => '2',
                'name' => 'Science',
                'pass_mark' => 75,
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );

        Subject::create(
            [
                'id' => '3',
                'name' => 'Information Technology',
                'pass_mark' => 80,
                'status' => false,
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );

        Subject::create(
            [
                'id' => '4',
                'name' => 'Management',
                'pass_mark' => 70,
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );

        Subject::create(
            [
                'id' => '5',
                'name' => 'Human Resource',
                'pass_mark' => 75,
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );
    }
}
