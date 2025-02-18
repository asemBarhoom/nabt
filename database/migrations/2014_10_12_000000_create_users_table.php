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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prefix')->nullable();
            $table->string('phone')->nullable();
            $table->string('age')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('job')->nullable(true);
            $table->string('image')->nullable(true);
            $table->timestamp('dob')->nullable(true);
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->longText('marketing_token')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['prefix', 'phone']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
