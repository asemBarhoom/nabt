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
        Schema::create('points', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id') // Foreign key referencing 'users' table
            ->constrained('users')
                ->cascadeOnDelete();
            $table->json('description', 255); // Record description
            $table->integer('points_earned'); // Points earned in this record
            $table->integer('total_points'); // Total points after this record
            $table->string('points_type', 50)->nullable(); // Optional: Type of points (e.g., loyalty, bonus)
            $table->string('status', 50)->default('pending'); // Record status
            $table->dateTime('expires_at')->nullable(); // Points expiration date
            $table->string('source', 100)->nullable(); // Source of points
            $table->boolean('is_adjustment')->default(false); // Flag for adjustment records
            $table->json('notes')->nullable(); // Additional information or comments
            $table->boolean('redeemable')->default(true); // Eligibility for redemption
            $table->unsignedBigInteger('awarded_by')->nullable(); // Admin or system ID
            $table->foreign('awarded_by')->references('id')->on('users')->nullOnDelete(); // Optional foreign key
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
};
