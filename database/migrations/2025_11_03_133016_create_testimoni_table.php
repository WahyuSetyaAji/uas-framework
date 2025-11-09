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
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id();
            $table->string('nama_testimoni', 100);
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->text('komentar');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->date('tanggal_testimoni')->useCurrent();
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimoni');
    }
};
