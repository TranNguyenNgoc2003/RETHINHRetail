<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roll')->insert([
            ['roll_name' => 'Admin'],
            ['roll_name' => 'Support Staff'],
            ['roll_name' => 'Technician'],
        ]);
    }
}
