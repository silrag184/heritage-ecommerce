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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('c_full_name');
            $table->string('c_phone')->unique();
            $table->string('c_email')->nullable()->unique();
            $table->string('c_password');

            // Profile info
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->text('c_address')->nullable();
            $table->string('c_image')->nullable();

            // Authentication & verification
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('verification_code')->nullable(); // For phone/email OTPs
            $table->rememberToken(); // For Laravel’s “remember me” login feature
            $table->string('oauth_provider')->nullable(); // Google, Facebook, etc.
            $table->string('oauth_id')->nullable();

            // Account management
            $table->tinyInteger('status')->default(1)->comment('1 = active, 0 = inactive, 2 = banned');
            $table->boolean('is_guest')->default(false); // For guest checkout

            // Analytics
            $table->integer('login_count')->default(0);
            $table->decimal('total_spent', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
