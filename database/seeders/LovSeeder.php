<?php

namespace Database\Seeders;

use App\Models\Lov;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LovSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lov::firstOrCreate(
            [
                'id' => '1',
                'name' => 'Masters',
                'lov_category_id' => '1',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '2',
                'name' => 'Dgree',
                'lov_category_id' => '1',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '3',
                'name' => 'Diploma',
                'lov_category_id' => '1',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '4',
                'name' => 'Other',
                'lov_category_id' => '1',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '5',
                'name' => 'Male',
                'lov_category_id' => '2',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '6',
                'name' => 'Female',
                'lov_category_id' => '2',
            ]
        );
    }
}
