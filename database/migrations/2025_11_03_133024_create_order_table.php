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
            $table->text('catatan_custom')->nullable();
            $table->date('tanggal_order')->useCurrent();
            $table->enum('booking_method', ['tempat', 'kirim']);
            $table->text('alamat')->nullable();
            $table->enum('status_order', ['pending', 'processing', 'completed', 'canceled'])->default('pending');
            $table->timestamps();

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
