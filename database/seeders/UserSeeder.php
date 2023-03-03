<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = User::create([
            'id' => '1',
            'first_name' => 'Sarada',
            'last_name' => 'Bhagya',
            'email' => 'sarada@zuse.lk',
            'password' => bcrypt('sarada@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $Admin->assignRole([1]);
    }
}
