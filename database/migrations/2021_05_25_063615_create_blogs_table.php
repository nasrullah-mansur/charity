<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('slug')->nullable();
            $table->text('pl_title')->nullable();
            $table->text('sl_title')->nullable();

            $table->longText('pl_description_pre_image')->nullable();
            $table->longText('sl_description_pre_image')->nullable();

            $table->longText('pl_description_post_image')->nullable();
            $table->longText('sl_description_post_image')->nullable();

            $table->string('primary_image')->nullable();
            $table->string('secondary_image')->nullable();

            $table->boolean('active_status')->default(true);
            $table->boolean('popular')->default(true);

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
        Schema::dropIfExists('blogs');
    }
}
