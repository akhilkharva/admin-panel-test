<?php

namespace Database\Seeders;

use App\Models\SupplierCategory;
use Illuminate\Database\Seeder;

class SupplierCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronic',
            ],
            [
                'name' => 'Food',
            ],
            [
                'name' => 'Furniture',
            ],
            [
                'name' => 'Other',
            ],
        ];

        foreach ($categories as $category) {
            SupplierCategory::create($category);
        }
    }
}
