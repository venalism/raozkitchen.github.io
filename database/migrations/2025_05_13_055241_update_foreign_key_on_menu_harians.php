<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_harians', function (Blueprint $table) {
            $table->dropForeign(['jadwal_menu_id']);
            $table->foreign('jadwal_menu_id')
                  ->references('id')->on('jadwal_menus')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('menu_harians', function (Blueprint $table) {
            $table->dropForeign(['jadwal_menu_id']);
            $table->foreign('jadwal_menu_id')
                  ->references('id')->on('jadwal_menus')
                  ->onDelete('restrict');
        });
    }
};
