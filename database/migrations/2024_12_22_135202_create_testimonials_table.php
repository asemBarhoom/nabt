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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->json('position')->nullable();
            $table->json('body')->nullable();
            $table->float('rating', 2, 1)->default(0);
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);

            // Polymorphic relation fields
            // Manually define nullable polymorphic relationship fields
            $table->unsignedBigInteger('testimonialsable_id')->nullable();  // Make the ID nullable
            $table->string('testimonialsable_type')->nullable();            // Make the type nullable

            $table->softDeletes();
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
        Schema::dropIfExists('testimonials');
    }
};
