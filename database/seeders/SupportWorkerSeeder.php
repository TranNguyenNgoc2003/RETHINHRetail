<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('support_worker')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'phone' => '0901234567',
                'email' => 'nguyenvana@example.com',
                'roll_id' => 1, // Admin
            ],
            [
                'name' => 'Trần Thị B',
                'phone' => '0912345678',
                'email' => 'tranthib@example.com',
                'roll_id' => 2, // Support Staff
            ],
            [
                'name' => 'Lê Văn C',
                'phone' => '0923456789',
                'email' => 'levanc@example.com',
                'roll_id' => 3, // Technician
            ],
        ]);
    }
}
