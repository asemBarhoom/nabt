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
        Schema::create('cancellations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('body')->nullable();

            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to categories
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');


            $table->unsignedBigInteger('booking_id')->nullable(); // Foreign key to categories
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('set null');

            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key to categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

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
        Schema::dropIfExists('cancellations');
    }
};
