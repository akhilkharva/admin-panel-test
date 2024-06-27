<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class ProductsBulkImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $supplierId = Supplier::where('name', $row['supplier'])->first()->id;
        $supplierCategoryId = SupplierCategory::where('name', $row['supplier_category'])->first()->id;

        return new Product([
            'name' => $row['name'],
            'title' => $row['title'],
            'sku' => $row['sku'],
            'supplier_id' => $supplierId,
            'supplier_category_id' => $supplierCategoryId,
            'description' => $row['description'],
            'price' => $row['price'],
            'variation' => $row['variation'],
            'url' => $row['url'],
            'created_by' => 1,
        ]);
        unset($supplierId, $supplierCategoryId);
    }
}
