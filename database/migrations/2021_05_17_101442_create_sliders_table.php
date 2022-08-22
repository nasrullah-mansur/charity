<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->string('image')->nullable();
            $table->string('pl_title')->nullable();
            $table->text('pl_subtitle')->nullable();
            $table->string('sl_title')->nullable();
            $table->text('sl_subtitle')->nullable();
            $table->boolean('active_status')->default(false);

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
        Schema::dropIfExists('sliders');
    }
}
