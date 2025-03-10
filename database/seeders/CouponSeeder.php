<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupon')->insert([
            [
                'title' => 'Giảm giá 10%',
                'code' => strtoupper(Str::random(12)),
                'count' => 100,
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(30)->toDateString(),
                'promotion' => 10,
                'describe' => 'Mã giảm giá 10% cho tất cả sản phẩm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Giảm giá 20%',
                'code' => strtoupper(Str::random(12)),
                'count' => 50,
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(15)->toDateString(),
                'promotion' => 20,
                'describe' => 'Mã giảm giá 20% cho tất cả sản phẩm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Giảm 5% cho tất cả sản phẩm',
                'code' => strtoupper(Str::random(12)),
                'count' => 30,
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(20)->toDateString(),
                'promotion' => 5,
                'describe' => 'Mã giảm giá 5% cho tất cả sản phẩm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Giảm ngay 20% cho tất cả sản phẩm',
                'code' => strtoupper(Str::random(12)),
                'count' => 25,
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(25)->toDateString(),
                'promotion' => 20,
                'describe' => 'Mã giảm giá 20% cho tất cả sản phẩm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ưu đãi sinh nhật 15%',
                'code' => strtoupper(Str::random(12)),
                'count' => 50,
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(30)->toDateString(),
                'promotion' => 15,
                'describe' => 'Giảm 15% nhân dịp sinh nhật RETHINK Retail',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ưu đãi sinh nhật 20%',
                'code' => strtoupper(Str::random(12)),
                'count' => 50,
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(7)->toDateString(),
                'promotion' => 20,
                'describe' => 'Giảm 20% nhân dịp sinh nhật RETHINK Retail',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
