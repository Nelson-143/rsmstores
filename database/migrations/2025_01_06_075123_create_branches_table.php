<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Branch name
            $table->unsignedBigInteger('created_by'); // Super admin ID
            $table->enum('status', ['active', 'disabled'])->default('active'); // Branch status
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraint
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }
}