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
        Schema::create('jadwal_menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_jadwal');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->foreignId('created_by')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_menus');
    }
};
