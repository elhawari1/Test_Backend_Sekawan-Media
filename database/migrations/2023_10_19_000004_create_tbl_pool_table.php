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
        Schema::create('tbl_pool', function (Blueprint $table) {
            $table->id('id_pool');
            $table->foreignId('id_role')->references('id_role')->on('tbl_role');
            $table->string('user_pool');
            $table->string('pool');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pool');
    }
};
