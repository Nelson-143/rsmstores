<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('custom_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Custom product name
            $table->unsignedInteger('quantity');
            $table->decimal('unitcost', 10, 2);
            $table->decimal('total', 10, 2);
            $table->foreignId('location_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_order_details');
    }
}