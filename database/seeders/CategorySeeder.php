<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Coffee',
            ],
            [
                'name' => 'Tea',
            ],
            [
                'name' => 'Non-Coffee',
            ],
            [
                'name' => 'Snack',
            ],
            [
                'name' => 'Dessert',
            ],
            [
                'name' => 'Main Course',
            ],
            [
                'name' => 'Juice',
            ],
            [
                'name' => 'Smoothies',
            ],
            [
                'name' => 'Milkshake',
            ],
            [
                'name' => 'Mocktail',
            ],
        ]);
    }
}
