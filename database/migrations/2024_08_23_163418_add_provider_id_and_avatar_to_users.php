<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook_id')->nullable()->unique();
            $table->text('facebook_token')->nullable();
            $table->text('facebook_refresh_token')->nullable();
            $table->string('google_id')->nullable()->unique();
            $table->string('avatar')->nullable(); // Lưu trữ ảnh đại diện nếu cần
            $table->string('otp')->nullable();
            $table->timestamp('otp_expiry')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('facebook_id');
            $table->dropColumn(['facebook_token', 'facebook_refresh_token']);
            $table->dropColumn('google_id');
            $table->dropColumn('avatar');
            $table->dropColumn(['otp', 'otp_expiry']);
        });
    }
};
