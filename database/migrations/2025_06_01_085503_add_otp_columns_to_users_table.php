<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('reset_otp')->nullable()->after('remember_token');
            $table->timestamp('otp_expires_at')->nullable()->after('reset_otp');
            $table->timestamp('otp_verified_at')->nullable()->after('otp_expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['reset_otp', 'otp_expires_at', 'otp_verified_at']);
        });
    }
};
