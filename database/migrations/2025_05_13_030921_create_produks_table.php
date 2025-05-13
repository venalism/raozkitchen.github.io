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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_produk');
            $table->string('satuan'); // contoh: porsi, cup
            $table->decimal('harga_default', 10, 2);
            $table->text('keterangan')->nullable();
            $table->integer('jumlah_standar_unit')->default(1);
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
