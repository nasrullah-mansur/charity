<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->string('pl_title')->nullable();
            $table->string('sl_title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('pl_details')->nullable();
            $table->longText('sl_details')->nullable();

            $table->decimal('goal_amount')->default(0);
            $table->decimal('recommended_amount')->default(0);
            $table->decimal('prefillable_amount')->default(0);
            $table->decimal('raised_amount')->default(0);

            $table->decimal('service_charge')->default(0);
            $table->boolean('is_percentage_service_charge')->default(false);

            $table->text('video_url')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->string('document')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->boolean('end_with_goal_achieve')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->tinyInteger('status')->default(CAMPAIGN_PENDIGN);

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
        Schema::dropIfExists('campaigns');
    }
}
