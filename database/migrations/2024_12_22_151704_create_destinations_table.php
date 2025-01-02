<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('body');
            $table->json('description');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->json('weather_description')->nullable();
            $table->json('amenities')->nullable();
            $table->integer('annual_visitors_min')->nullable();
            $table->integer('annual_visitors_max')->nullable();
            $table->json('recommended_visit_season')->nullable();
            $table->boolean('lat')->nullable();
            $table->boolean('lng')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
};
