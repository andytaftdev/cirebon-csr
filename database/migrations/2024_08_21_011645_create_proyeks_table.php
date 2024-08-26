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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->increments('id');
            $table->json('id_user')->nullable();
            $table->integer('id_sektor')->unsigned();
            $table->integer('id_program')->unsigned();
            $table->string('nama_proyek');
            $table->string('kecamatan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('tanggal_terbit')->nullable();
            $table->integer('jumlah_mitra')->default(0);
            $table->text('deskripsi');
            $table->string('gambar_proyek')->default('default.png');
            $table->string('kuartal')->nullable();
            $table->string('status');
            $table->foreign('id_sektor')->references('id')->on('sektors')->onUpdate('cascade');
            $table->foreign('id_program')->references('id')->on('programs')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
