<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charities', function (Blueprint $table) {
            $table->id();

            $table->string('pl_title_01')->nullable();
            $table->text('pl_subtitle_01')->nullable();
            $table->string('sl_title_01')->nullable();
            $table->text('sl_subtitle_01')->nullable();


            $table->string('pl_title_02')->nullable();
            $table->text('pl_subtitle_02')->nullable();
            $table->string('sl_title_02')->nullable();
            $table->text('sl_subtitle_02')->nullable();


            $table->string('pl_title_03')->nullable();
            $table->text('pl_subtitle_03')->nullable();
            $table->string('sl_title_03')->nullable();
            $table->text('sl_subtitle_03')->nullable();


            $table->string('pl_title_04')->nullable();
            $table->text('pl_subtitle_04')->nullable();
            $table->string('sl_title_04')->nullable();
            $table->text('sl_subtitle_04')->nullable();

            $table->string('image')->nullable();
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
        Schema::dropIfExists('charities');
    }
}
