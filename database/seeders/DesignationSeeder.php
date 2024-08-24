<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    public function run()
    {
        DB::table('designations')->insert([
            ['name' => 'Manager'],
            ['name' => 'Developer'],
            ['name' => 'Designer'],
        ]);
    }
}
