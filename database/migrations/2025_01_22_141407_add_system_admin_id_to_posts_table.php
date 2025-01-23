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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('system_admin_id')->nullable()->after('id'); // إضافة العمود بعد عمود id
            $table->foreign('system_admin_id')
                ->references('id')
                ->on('system_admins')
                ->cascadeOnDelete(); // الربط بمفتاح خارجي
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['system_admin_id']); // حذف المفتاح الخارجي
            $table->dropColumn('system_admin_id');    // حذف العمود
        });
    }
};
