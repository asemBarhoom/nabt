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
        Schema::create('system_admins', function (Blueprint $table) {
            $table->id();
            $table->text('fcm_token')->nullable();
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('mobile', 191)->nullable();
            $table->string('password', 191)->nullable();
            $table->integer('status')->default(1);
            $table->string('avatar', 191)->nullable();
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('system_admins');
    }
};
