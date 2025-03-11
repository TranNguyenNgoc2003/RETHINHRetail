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
            [
                'method' => 'Credit/Debit Card',
                'description' => 'Thẻ tín dụng hoặc ghi nợ',
                'path_logo' => 'visa-mastercard-logos.png'
            ],
            [
                'method' => 'VNPAY',
                'description' => 'Ví điện tử VNPAY',
                'path_logo' => 'Logo-VNPAY-QR.png'
            ],
            [
                'method' => 'COD',
                'description' => 'Thanh toán khi nhận hàng',
                'path_logo' => 'cash-on-delivery.png'
            ],
        ]);
    }
}
