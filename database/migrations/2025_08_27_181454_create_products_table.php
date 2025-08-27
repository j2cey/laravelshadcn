<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->index(); 
            $table->string('name')->index(); 
            $table->string('title')->index();
            $table->string('description')->index();
            $table->integer('category_ref_id')->index();
            $table->integer('brand_ref_id')->index();
            $table->decimal('price')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->text('benefits_content')->nullable();
            $table->text('howtouse_content')->nullable();
            $table->string('product_size_id')->nullable();
            $table->tinyInteger('is_active')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
