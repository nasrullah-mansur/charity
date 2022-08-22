<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();

            $table->string('pl_first_stage_title')->nullable();
            $table->text('pl_first_stage_subtitle')->nullable();
            $table->string('sl_first_stage_title')->nullable();
            $table->text('sl_first_stage_subtitle')->nullable();
            $table->string('first_stage_image')->nullable();

            $table->string('pl_second_stage_title')->nullable();
            $table->text('pl_second_stage_subtitle')->nullable();
            $table->string('sl_second_stage_title')->nullable();
            $table->text('sl_second_stage_subtitle')->nullable();
            $table->string('second_stage_image')->nullable();

            $table->string('pl_third_stage_title')->nullable();
            $table->text('pl_third_stage_subtitle')->nullable();
            $table->string('sl_third_stage_title')->nullable();
            $table->text('sl_third_stage_subtitle')->nullable();
            $table->string('third_stage_image')->nullable();

            $table->string('pl_fourth_stage_title')->nullable();
            $table->text('pl_fourth_stage_subtitle')->nullable();
            $table->string('sl_fourth_stage_title')->nullable();
            $table->text('sl_fourth_stage_subtitle')->nullable();
            $table->string('fourth_stage_image')->nullable();

            $table->string('pl_fifth_stage_title')->nullable();
            $table->text('pl_fifth_stage_subtitle')->nullable();
            $table->string('sl_fifth_stage_title')->nullable();
            $table->text('sl_fifth_stage_subtitle')->nullable();
            $table->string('fifth_stage_image')->nullable();

            $table->boolean('active_status')->default(true);

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
        Schema::dropIfExists('journeys');
    }
}
