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
        Schema::create('units', function (Blueprint $table) {
    $table->id();
    $table->foreignId("user_id")->constrained()->onDelete('cascade');
    $table->string('name');
    $table->string('slug')->nullable();
    $table->string('short_code')->nullable();
    $table->unsignedBigInteger('account_id'); // Reference to accounts table
    $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
