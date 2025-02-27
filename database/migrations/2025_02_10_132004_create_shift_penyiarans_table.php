<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('shift_penyiarans', function (Blueprint $table) {
            $table->renameColumn('isi_berita', 'naskah_siaran');
        });
    }

    public function down()
    {
        Schema::table('shift_penyiarans', function (Blueprint $table) {
            $table->renameColumn('naskah_siaran', 'isi_berita'); // ✅ Perbaikan
        });
    }
};
