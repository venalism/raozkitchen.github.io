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
        Schema::table('produk_menus', function (Blueprint $table) {
            $table->dropForeign(['menu_harian_id']);
            $table->foreign('menu_harian_id')
                  ->references('id')->on('menu_harians')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk_menus', function (Blueprint $table) {
            $table->dropForeign(['menu_harian_id']);
            $table->foreign('menu_harian_id')
                  ->references('id')->on('menu_harians')
                  ->onDelete('restrict'); // atau 'no action' sesuai default sebelumnya
        });
    }
};