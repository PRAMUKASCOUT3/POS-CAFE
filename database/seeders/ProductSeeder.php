<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lastKode = Product::max('code');
        $lastNumber = $lastKode ? intval(substr($lastKode, 2)) : 0;

        $menu = [
            [
                'id_category' => 1, // Coffee
                'code' => 'CF-001',
                'name' => 'Espresso',
                'brand' => 'Arabica Blend',
                'stock' => 50,
                'price_buy' => 10000,
                'price_sell' => 15000,
                'unit' => 'Cup',
                'image' => 'https://images.unsplash.com/photo-1510626176961-4b37d6afc5c5?w=800', // ☕ espresso
            ],
            [
                'id_category' => 1, // Coffee
                'code' => 'CF-002',
                'name' => 'Cappuccino',
                'brand' => 'Creamy Roast',
                'stock' => 40,
                'price_buy' => 12000,
                'price_sell' => 18000,
                'unit' => 'Cup',
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=800', // ☕ cappuccino
            ],
            [
                'id_category' => 2, // Snack
                'code' => 'SN-001',
                'name' => 'French Fries',
                'brand' => 'CrispyBite',
                'stock' => 30,
                'price_buy' => 8000,
                'price_sell' => 15000,
                'unit' => 'Plate',
                'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?w=800', // 🍟 french fries
            ],
            [
                'id_category' => 2, // Snack
                'code' => 'SN-002',
                'name' => 'Chicken Wings',
                'brand' => 'SpicyBite',
                'stock' => 25,
                'price_buy' => 15000,
                'price_sell' => 25000,
                'unit' => 'Plate',
                'image' => 'https://images.unsplash.com/photo-1606755962773-0e7d85d0d5a5?w=800', // 🍗 wings
            ],
            [
                'id_category' => 3, // Dessert
                'code' => 'DS-001',
                'name' => 'Chocolate Cake',
                'brand' => 'SweetTreat',
                'stock' => 20,
                'price_buy' => 18000,
                'price_sell' => 28000,
                'unit' => 'Slice',
                'image' => 'https://images.unsplash.com/photo-1605475128023-9bb7a1c7a5b1?w=800', // 🍰 chocolate cake
            ],
        ];

        $now = Carbon::now();
        foreach ($menu as $index => $menus) {
            $lastNumber++;
            $menus['code'] = 'MN' . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
            $menus['created_at'] = $now->copy()->addMinutes($index);
            $menus['updated_at'] = $menus['created_at'];

            Product::create($menus);
        }
    }
}
