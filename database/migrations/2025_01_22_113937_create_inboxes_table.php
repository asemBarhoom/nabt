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
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المستخدم
            $table->string('phone'); // رقم الجوال
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('subject')->nullable(); // عنوان الرسالة (قد يكون اختياريًا)
            $table->text('message'); // الرسالة
            $table->timestamps(); // تاريخ الإنشاء والتحديث


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
        Schema::dropIfExists('inboxes');
    }
};
