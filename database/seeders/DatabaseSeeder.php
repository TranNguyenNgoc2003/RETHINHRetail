<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'fullname' => 'Test User',
            'email' => 'test@example.com',

        ]);

        $this->call(PromotionSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(RollSeeder::class);
        $this->call(SupportWorkerSeeder::class);
    }
}
