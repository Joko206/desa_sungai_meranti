<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Add tanggal_selesai field to pengajuan_surat table
        Schema::table('pengajuan_surat', function (Blueprint $table) {
            $table->date('tanggal_selesai')->nullable()->after('alasan_penolakan');
        });

        // Add tanggal_selesai field to surat_terbit table
        Schema::table('surat_terbit', function (Blueprint $table) {
            $table->date('tanggal_selesai')->nullable()->after('status_cetak');
        });
    }

    public function down(): void {
        Schema::table('pengajuan_surat', function (Blueprint $table) {
            $table->dropColumn('tanggal_selesai');
        });

        Schema::table('surat_terbit', function (Blueprint $table) {
            $table->dropColumn('tanggal_selesai');
        });
    }
};