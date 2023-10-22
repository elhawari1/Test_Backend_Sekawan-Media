<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_detail_pesanan', function (Blueprint $table) {
            $table->id('id_detail_pesanan');
            $table->foreignId('id_pesanan')->references('id_pesanan')->on('tbl_pesanan');
            $table->string('status_pool');
            $table->string('status_manager');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_detail_pesanan');
    }
};