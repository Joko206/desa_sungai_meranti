<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jenis_surat', function (Blueprint $table) {
            $table->json('syarat')->nullable()->comment('Array nama syarat untuk pengajuan surat');
        });
    }

    public function down(): void
    {
        Schema::table('jenis_surat', function (Blueprint $table) {
            $table->dropColumn('syarat');
        });
    }
};