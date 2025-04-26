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
        Schema::create('siarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyiar_id')->constrained('penyiars')->onDelete('cascade');
            $table->string('judul_siaran')->nullable();
            $table->date('tanggal');
            $table->time('jam')->nullable();
//            $table->string('durasi');
//            $table->string('penyiar');
            $table->enum('daypart', ['SPADA', 'SANTAI_SIANG', 'SORE_CERIA', 'JAGA_MALAM']);
            $table->text('interaksi_pendengar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siarans');
    }
};
