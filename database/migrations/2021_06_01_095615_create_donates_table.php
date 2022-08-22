<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('campaigner_id')->nullable();
            $table->bigInteger('campaign_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->decimal('amount')->default(0);
            $table->decimal('amount_refunded')->default(0);
            $table->decimal('application_fee')->default(0);
            $table->decimal('application_fee_amount')->default(0);
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_method_type')->nullable();
            $table->string('status')->nullable();
            $table->string('intent')->nullable();

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
        Schema::dropIfExists('donates');
    }
}
