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
        Schema::create('shipping_areas', function (Blueprint $table) {
            $table->id();
            $table->string('area_name');                 // e.g. "Dhaka City", "Chattogram"
            $table->string('region')->nullable();        // e.g. "Dhaka Division"
            $table->string('postal_code')->nullable();   // optional, for precise targeting
            $table->decimal('shipping_cost', 10, 2)->default(0.00);
            $table->integer('delivery_time')->nullable(); // in days, e.g. 2-3 days
            $table->tinyInteger('status')->default(1);    // active/inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_areas');
    }
};
