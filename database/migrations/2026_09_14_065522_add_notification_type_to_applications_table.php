<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dateTime('notification_expires_at')
                ->nullable()
                ->after('notification_type');
        });

        /*
        |--------------------------------------------------------------------------
        | DATA LAMA
        |--------------------------------------------------------------------------
        |
        | Jika sebelumnya sudah ada NEW / UPDATE,
        | otomatis diberikan batas waktu 7 hari berdasarkan updated_at.
        |
        */

        DB::statement("
            UPDATE applications
            SET notification_expires_at =
                DATE_ADD(
                    COALESCE(updated_at, created_at),
                    INTERVAL 7 DAY
                )
            WHERE notification_type IS NOT NULL
        ");
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('notification_expires_at');
        });
    }
};
