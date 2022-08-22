<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_areas', function (Blueprint $table) {
            $table->id();
            $table->string('pl_title')->nullable();
            $table->string('sl_title')->nullable();

            $table->string('first_section_counter')->nullable();
            $table->string('second_section_counter')->nullable();
            $table->string('third_section_counter')->nullable();
            $table->string('fourth_section_counter')->nullable();

            $table->string('pl_first_section_unit')->nullable();
            $table->string('pl_second_section_unit')->nullable();
            $table->string('pl_third_section_unit')->nullable();
            $table->string('pl_fourth_section_unit')->nullable();

            $table->string('sl_first_section_unit')->nullable();
            $table->string('sl_second_section_unit')->nullable();
            $table->string('sl_third_section_unit')->nullable();
            $table->string('sl_fourth_section_unit')->nullable();


            $table->text('pl_first_section_title')->nullable();
            $table->text('pl_second_section_title')->nullable();
            $table->text('pl_third_section_title')->nullable();
            $table->text('pl_fourth_section_title')->nullable();

            $table->text('sl_first_section_title')->nullable();
            $table->text('sl_second_section_title')->nullable();
            $table->text('sl_third_section_title')->nullable();
            $table->text('sl_fourth_section_title')->nullable();

            $table->string('first_section_icon')->nullable();
            $table->string('second_section_icon')->nullable();
            $table->string('third_section_icon')->nullable();
            $table->string('fourth_section_icon')->nullable();
            $table->string('background_image')->nullable();

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
        Schema::dropIfExists('help_areas');
    }
}
