<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            // Samsung Galaxy S24 Ultra
            [
                'path_img' => 'samsung-galaxy-s24-ultra-1.jpg',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'samsung-galaxy-s24-ultra-2.jpg',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'samsung-galaxy-s24-ultra-3.jpg',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // MacBook Air M2 13-inch
            [
                'path_img' => 'macbook-air-m2-1.jpg',
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'macbook-air-m2-2.jpg',
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // iPhone 15 Pro Max 256GB
            [
                'path_img' => 'iphone-15-pro-max-1.jpg',
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'iphone-15-pro-max-2.jpg',
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'iphone-15-pro-max-3.jpg',
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // iPad Pro M2 11-inch
            [
                'path_img' => 'ipad-pro-m2-1.jpg',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'ipad-pro-m2-2.jpg',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'xiaomi-14-ultra-1.jpg',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'xiaomi-14-ultra-2.jpg',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'xiaomi-14-ultra-3.jpg',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ASUS ROG Strix G16 (2024)
            [
                'path_img' => 'asus-rog-strix-g16-1.jpg',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'asus-rog-strix-g16-2.jpg',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'asus-rog-strix-g16-3.jpg',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Sony WH-1000XM5
            [
                'path_img' => 'sony-wh-1000xm5-1.jpg',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'sony-wh-1000xm5-2.jpg',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Google Pixel 8 Pro
            [
                'path_img' => 'google-pixel-8-pro-1.jpg',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'google-pixel-8-pro-2.jpg',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Dell XPS 15 9530
            [
                'path_img' => 'dell-xps-15-9530-1.jpg',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_img' => 'dell-xps-15-9530-2.jpg',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // PlayStation 5 Standard Edition
            [
                'path_img' => 'playstation-5-1.jpg',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'playstation-5-2.jpg',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Samsung Galaxy S24 Ultra
            [
                'path_img' => 'samsung-galaxy-s24-ultra-1.jpg',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'samsung-galaxy-s24-ultra-2.jpg',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'samsung-galaxy-s24-ultra-3.jpg',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // MacBook Air M2 13-inch
            [
                'path_img' => 'macbook-air-m2-1.jpg',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'macbook-air-m2-2.jpg',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // iPhone 15 Pro Max 256GB
            [
                'path_img' => 'iphone-15-pro-max-1.jpg',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'iphone-15-pro-max-2.jpg',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'iphone-15-pro-max-3.jpg',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // iPad Pro M2 11-inch
            [
                'path_img' => 'ipad-pro-m2-1.jpg',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'ipad-pro-m2-2.jpg',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Xiaomi 14 Ultra
            [
                'path_img' => 'xiaomi-14-ultra-1.jpg',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'xiaomi-14-ultra-2.jpg',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'xiaomi-14-ultra-3.jpg',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ASUS ROG Strix G16 (2024)
            [
                'path_img' => 'asus-rog-strix-g16-1.jpg',
                'product_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-2.jpg',
                'product_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-3.jpg',
                'product_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'path_img' => 'asus-rog-strix-g16-1.jpg',
                'product_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-2.jpg',
                'product_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-3.jpg',
                'product_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Google Pixel 8 Pro
            [
                'path_img' => 'google-pixel-8-pro-1.jpg',
                'product_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'google-pixel-8-pro-2.jpg',
                'product_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Dell XPS 15 9530
            [
                'path_img' => 'dell-xps-15-9530-1.jpg',
                'product_id' => 19,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'dell-xps-15-9530-2.jpg',
                'product_id' => 19,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // PlayStation 5 Standard Edition (Duplicate Entry)
            [
                'path_img' => 'playstation-5-1.jpg',
                'product_id' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'playstation-5-2.jpg',
                'product_id' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ASUS ROG Strix G16 (2024) (Duplicate Entries for Product ID 24)
            [
                'path_img' => 'asus-rog-strix-g16-1.jpg',
                'product_id' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-2.jpg',
                'product_id' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-3.jpg',
                'product_id' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-1.jpg',
                'product_id' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-2.jpg',
                'product_id' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-3.jpg',
                'product_id' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-1.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-2.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-3.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-4.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-5.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-6.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-7.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-8.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path_img' => 'asus-rog-strix-g16-9.jpg',
                'product_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
