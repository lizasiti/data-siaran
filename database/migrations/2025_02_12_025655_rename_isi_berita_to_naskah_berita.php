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
        Schema::table('shift_penyiarans', function (Blueprint $table) {
            $table->renameColumn('isi_berita', 'naskah_siaran'); // ✅ Mengganti nama kolom
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shift_penyiarans', function (Blueprint $table) {
            $table->renameColumn('naskah_siaran', 'isi_berita'); // ✅ Mengembalikan ke nama lama jika rollback
        });
    }
};
