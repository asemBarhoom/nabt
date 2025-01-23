<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->json('body')->nullable();
            $table->float('rating', 2, 1)->default(0);
            $table->boolean('status')->default(true);

            $table->unsignedBigInteger('user_id')->nullable();
            // Polymorphic relation fields
            // Manually define nullable polymorphic relationship fields
            $table->unsignedBigInteger('testimonialsable_id')->nullable();  // Make the ID nullable
            $table->string('testimonialsable_type')->nullable();            // Make the type nullable

            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('testimonials');
    }
};
