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
        Schema::create('tbl_driver', function (Blueprint $table) {
            $table->id('id_driver');
            $table->foreignId('id_role')->references('id_role')->on('tbl_role');
            $table->string('nid');
            $table->string('user_driver');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_driver');
    }
};
