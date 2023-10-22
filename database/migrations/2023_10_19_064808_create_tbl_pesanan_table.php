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
        Schema::create('tbl_pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->foreignId('pegawai')->references('id_user')->on('users');
            $table->foreignId('id_kendaraan')->references('id_kendaraan')->on('tbl_kendaraan');
            $table->foreignId('id_driver')->references('id_driver')->on('tbl_driver');
            $table->foreignId('id_pool')->references('id_pool')->on('tbl_pool');
            $table->foreignId('manager')->references('id_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pesanan');
    }
};
