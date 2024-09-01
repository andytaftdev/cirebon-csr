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
        Schema::create('identities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('mitra_logo')->default('default.png');
            $table->string('nama_mitra');
            $table->string('nama_pt')->nullable();;
            $table->string('nomor_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('message_non_aktif')->nullable();
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identities');
    }
};
