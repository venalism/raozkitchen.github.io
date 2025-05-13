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
        Schema::create('produk_menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('menu_harian_id')->constrained();
            $table->foreignId('produk_id')->constrained();
            $table->decimal('harga_menu', 10, 2);
            $table->text('keterangan_tambahan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_menus');
    }
};
