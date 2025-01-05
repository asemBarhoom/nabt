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
        Schema::create('tourevents', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->json('position')->nullable();
            $table->json('body')->nullable();
            $table->json('description')->nullable();
            $table->date('at')->nullable();
            $table->float('rating', 2, 1)->default(0);
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('category_id')->nullable();
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
        Schema::dropIfExists('tourevents');
    }
};
