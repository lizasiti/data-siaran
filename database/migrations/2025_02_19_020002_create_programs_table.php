<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('programs', function (Blueprint $table) {
        $table->id();
        $table->string('nama_program');
        $table->string('waktu');
        $table->text('deskripsi');
        $table->timestamps();
    });
    
}


    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
