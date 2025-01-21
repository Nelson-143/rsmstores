<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableForSubscriptions extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add subscription fields
            $table->unsignedBigInteger('subscription_id')->nullable()->after('photo');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('set null');

            $table->timestamp('subscription_ends_at')->nullable()->after('subscription_id');
            $table->boolean('is_trialing')->default(false)->after('subscription_ends_at');
            $table->timestamp('trial_ends_at')->nullable()->after('is_trialing');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop subscription fields
            $table->dropForeign(['subscription_id']);
            $table->dropColumn(['subscription_id', 'subscription_ends_at', 'is_trialing', 'trial_ends_at']);
        });
    }
}
