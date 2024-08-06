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
        Schema::create('siswa', function (Blueprint $table) {
            $table->timestamps();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->integer('nomor_hp');
            $table->integer('nomor_induk');
            $table->text('alamat');
            $table->string('gambar');
            $table->unique(array('nomor_induk'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
