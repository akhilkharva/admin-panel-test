<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'sku', 'description', 'supplier_id', 'supplier_category_id', 'url', 'status', 'price', 'variation', 'created_by', 'updated_by', 'deleted_by',
    ];

    public function supplier(){
        return $this->belongsTo('\App\Models\Supplier', 'supplier_id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
