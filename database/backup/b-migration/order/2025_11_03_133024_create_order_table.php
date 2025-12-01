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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cus', 100);
            $table->string('no_cus', 20);
            $table->unsignedBigInteger('produk_id');
            $table->enum('jenis_order', ['paten', 'custom']);
            $table->text('catatan_custom')->nullable();
            $table->integer('stock')->nullable();
            $table->date('tanggal_order')->useCurrent();
            $table->date('tanggal_booking')->nullable();
            $table->time('jam_booking')->nullable();
            $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
