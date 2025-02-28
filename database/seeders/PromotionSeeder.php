<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promotions')->insert([
            ['discount' => 'Xem chính sách ưu đãi dành cho thành viên Remember'],
            ['discount' => 'Hoàn tiền đến 2 triệu khi mở thẻ tín dụng HSBC'],
            ['discount' => 'Giảm đến 800.000đ khi thanh toán qua Techcombank'],
            ['discount' => 'Giảm đến 500.000đ khi thanh toán qua VNPAY'],
            ['discount' => 'Giảm đến 500.000đ khi thanh toán bằng thẻ tín dụng ACB'],
            ['discount' => 'Giảm đến 400.000đ khi thanh toán bằng thẻ tín dụng Home Credit'],
            ['discount' => 'Giảm đến 500.000đ khi thanh toán qua Kredivo'],
            ['discount' => 'Giảm đến 200.000đ khi thanh toán qua MOMO'],
            ['discount' => 'Liên hệ B2B để được tư vấn giá tốt nhất cho khách hàng doanh nghiệp khi mua số lượng nhiều'],
        ]);
    }
}
