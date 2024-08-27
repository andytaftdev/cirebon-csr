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
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('current_url')->nullable();
            $table->enum('status', ['revisi', 'baru', 'tolak', 'terima'])->default('baru');
            $table->enum('level', ['laporan', 'mitra'])->default('laporan');
            $table->boolean('terlihat')->default('0');
            $table->boolean('terlihat_admin')->default('0');
            $table->enum('access', ['admin', 'mitra'])->default('mitra');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
