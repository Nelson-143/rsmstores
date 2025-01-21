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
            $table->id();
            $table->string('name'); // Tier name (Starter, Essentials, etc.)
            $table->decimal('price', 10, 2); // Subscription price
            $table->integer('max_branches')->nullable(); // Limit on branches
            $table->integer('max_users')->nullable(); // Limit on team members
            $table->json('features')->nullable(); // List of features as JSON
            $table->timestamps();
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
