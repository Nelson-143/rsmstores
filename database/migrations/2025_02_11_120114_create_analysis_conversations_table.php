<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('analysis_conversations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->string('title');
        $table->enum('analysis_type', ['inventory', 'financial', 'customer', 'fraud']);
        $table->json('context')->nullable();
        $table->uuid('account_id')->nullable(); // Add account_id
        $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade'); // Add foreign key directly
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_conversations');
    }
};
