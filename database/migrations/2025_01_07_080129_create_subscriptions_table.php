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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Use UUID
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->integer('max_branches')->nullable();
            $table->integer('max_users')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();
            $table->uuid('account_id')->nullable(); // Add account_id
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade'); // Add foreign key directly
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
