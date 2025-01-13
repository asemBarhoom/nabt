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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->json('body')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->string('categoriable_type')->nullable();  // Type of model that belongs to this category
            $table->softDeletes();
            $table->timestamps();
            $table->index(['categoriable_type']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
