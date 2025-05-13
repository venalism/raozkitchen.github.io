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
        Schema::create('menu_harians', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('jadwal_menu_id')->constrained();
            $table->string('hari');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_harians');
    }
};
