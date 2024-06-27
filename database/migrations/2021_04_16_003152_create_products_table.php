<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('sku');
            $table->string('description')->nullable()->default(null);
            $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
            $table->string('main_image')->nullable()->default(null);
            $table->string('price');
            $table->string('variation')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->enum('status', ['Queue', 'Review', 'Published', 'Draft', 'Staged', 'Active', 'Inactive', 'Rejected']);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable()->default(null);
            $table->bigInteger('deleted_by')->nullable()->default(null);
            $table->foreignId('supplier_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
