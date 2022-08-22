<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonarFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donar_feedback', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->text('pl_feedback')->nullable();
            $table->text('sl_feedback')->nullable();
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
        Schema::dropIfExists('donar_feedback');
    }
}
