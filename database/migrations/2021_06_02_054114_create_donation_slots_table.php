<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_slots', function (Blueprint $table) {
            $table->id();
            $table->decimal('value1')->default(0);
            $table->decimal('value2')->default(0);
            $table->decimal('value3')->default(0);
            $table->decimal('value4')->default(0);
            $table->decimal('value5')->default(0);
            $table->decimal('value6')->default(0);
            $table->decimal('value7')->default(0);
            $table->decimal('value8')->default(0);
            $table->decimal('value9')->default(0);
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
        Schema::dropIfExists('donation_slots');
    }
}
