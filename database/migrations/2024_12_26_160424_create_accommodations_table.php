<?php

use App\Constants\AccommodationTypes;
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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->json('title');
            $table->enum('type', AccommodationTypes::all());
            $table->json('body')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('rooms');
            $table->integer('restaurants');
            $table->integer('cafes');
            $table->boolean('wifi')->default(false);
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
        Schema::dropIfExists('accommodations');
    }
};
