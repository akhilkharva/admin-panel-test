<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            [
                'name' => 'Amazon',
                'description' => 'Test Description',
            ],
            [
                'name' => 'Costway',
                'description' => 'Test Description',
            ],
            [
                'name' => 'Koehler Home Decor',
                'description' => 'Test Description',
            ],
            [
                'name' => 'other supplier',
                'description' => 'Test Description',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

    }
}
