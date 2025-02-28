<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            // In the migration file for debts
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('cascade');
            //$table->unsignedBigInteger('customer_id'); // Foreign key to the customers table
            $table->decimal('amount', 10, 2); // Total debt amount
            $table->decimal('amount_paid', 10, 2)->default(0); // Paid amount
            $table->date('due_date'); // Due date for the debt
            $table->timestamp('paid_at')->nullable(); // Payment date if fully paid
            $table->timestamps();
            // In the migration file for debts
            $table->uuid('uuid')->unique();
            $table->uuid('account_id')->nullable(); // Add account_id
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade'); // Add foreign key directly
            // Foreign key constraint
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts');
    }
}

