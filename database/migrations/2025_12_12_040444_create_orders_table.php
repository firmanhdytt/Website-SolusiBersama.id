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
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('email');
    $table->string('telepon');
    $table->string('layanan');
    $table->text('pesan');
    $table->string('budget');
    $table->date('deadline');
    $table->enum('status', ['pending', 'proses', 'selesai', 'batal'])->default('pending');
    $table->enum('status_pembayaran', ['belum', 'dp', 'lunas'])->default('belum');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
