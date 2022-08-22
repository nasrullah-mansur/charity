<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
            $table->bigInteger('campaign_id')->nullable();
            $table->string('withdraw_method')->nullable();
            $table->boolean('is_paypal_withdraw')->nullable(false);
            $table->string('paypal_account')->nullable();
            $table->string('stripe_account')->nullable();
            $table->string('stripe_card_number')->nullable();
            $table->decimal('goal_amount')->default(0);
            $table->decimal('raised_amount')->default(0);
            $table->decimal('service_charge')->default(0);
            $table->boolean('is_percentage_service_charge')->default(false);
            $table->decimal('total_service_charge')->default(0);
            $table->decimal('withdrawal_amount')->default(0);
            $table->dateTime('withdraw_date')->nullable();
            $table->string('transaction_id')->nullable();
            $table->boolean('status')->default(WITHDRAW_REQUEST);
            $table->boolean('is_approved')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraws');
    }
}
