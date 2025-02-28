<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for the user_missions table
class CreateUserMissionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('mission_id')->constrained('missions')->onDelete('cascade');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->timestamp('completed_at')->nullable();
            $table->uuid('account_id')->nullable(); // Add account_id
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade'); // Add foreign key directly
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_missions');
    }
}

