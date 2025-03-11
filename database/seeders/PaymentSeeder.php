<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment')->insert([
            ['method' => 'COD', 'description' => 'Thanh toán khi nhận hàng'],
            ['method' => 'Credit/Debit Card', 'description' => 'Thanh toán bằng thẻ tín dụng hoặc ghi nợ'],
            ['method' => 'VNPAY', 'description' => 'Ví điện tử VNPAY'],
        ]);
    }
}
