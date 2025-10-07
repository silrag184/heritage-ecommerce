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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();

            $table->string('product_name');
            $table->string('slug')->unique();
            $table->string('sku')->unique(); // stock keeping unit / product code
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();

            $table->boolean('status')->default(1)->comment('1=active,0=inactive');
           // Product flags
            $table->boolean('is_featured')->default(0)->comment('1=featured, 0=normal');
            $table->boolean('is_trending')->default(0)->comment('1=trending, 0=normal');
            $table->boolean('is_new')->default(0)->comment('1=new, 0=old');

            // Product analytics
            $table->unsignedBigInteger('hit_count')->default(0)->comment('Number of views');
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('set null');
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
