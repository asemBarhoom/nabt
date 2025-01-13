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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('color')->nullable(); // Add a nullable color column
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->morphs('statusable'); // Adds statusable_id and statusable_type
            $table->timestamps();

            // Adding indexes to improve query performance
            $table->index('status'); // Index for searching by status
            $table->index('user_id'); // Index for searching by user
            $table->index('statusable_id'); // Index for polymorphic relation's ID
            $table->index('statusable_type'); // Index for polymorphic relation's type
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
};
