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
        Schema::create('laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_sektor')->unsigned();
            $table->integer('id_proyek')->unsigned();
            $table->integer('id_program')->unsigned();
            $table->string('judul');
            $table->string('nama_proyek')->nullable();
            $table->integer('tanggal')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('realisasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('message')->nullable();
            $table->json('gambar_laporan');
            $table->string('kuartal')->nullable();
            $table->boolean('changed')->default('0');
            $table->enum('status', ['draf', 'revisi', 'terima','pengajuan','tolak'])->default('draf');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('id_sektor')->references('id')->on('sektors')->onUpdate('cascade');
            $table->foreign('id_proyek')->references('id')->on('proyeks')->onUpdate('cascade');
            $table->foreign('id_program')->references('id')->on('programs')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
