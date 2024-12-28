<?php

use App\Constants\RoomType;
use App\Constants\TripTypes;
use App\Constants\VehicleType;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_number')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->unsignedBigInteger('accommodation_id')->nullable();
            $table->date('booking_date');
            $table->time('arrival_time');
            $table->integer('num_adults');
            $table->integer('num_children')->nullable();
            $table->integer('num_rooms')->nullable();
            $table->enum('room_type', RoomType::all())->nullable();
            $table->integer('num_meals')->nullable();
            $table->text('meal_notes')->nullable();
            $table->enum('trip_type', TripTypes::all());
            $table->boolean('food_allergies')->default(false);
            $table->enum('vehicle_type', VehicleType::all())->nullable();
            $table->string('vehicle_description')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('destination_id')
                ->references('id')
                ->on('destinations')
                ->cascadeOnDelete();

            $table->foreign('accommodation_id')
                ->references('id')
                ->on('accommodations')
                ->cascadeOnDelete();

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
        Schema::dropIfExists('bookings');
    }
};
