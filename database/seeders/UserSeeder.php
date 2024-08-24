<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'fk_department' => 1,
                'fk_designation' => 1,
                'phone_number' => '1234567890',
                'created_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'fk_department' => 2,
                'fk_designation' => 2,
                'phone_number' => '0987654321',
                'created_at' => now(),
            ],
            [
                'name' => 'Tommy',
                'fk_department' => 2,
                'fk_designation' => 2,
                'phone_number' => '9087431278',
                'created_at' => now(),
            ],
            [
                'name' => 'James',
                'fk_department' => 1,
                'fk_designation' => 1,
                'phone_number' => '9710923467',
                'created_at' => now(),
            ],
        ]);
    }
}
