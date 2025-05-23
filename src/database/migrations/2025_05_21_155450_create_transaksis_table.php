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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('tipe_transaksi', ['Penjualan', 'Pembelian', 'Retur']);
            $table->decimal('total_harga', 15, 2);
            $table->timestamp('tanggal_transaksi');
            $table->text('keterangan')->nullable();
            $table->enum('status_pembayaran', ['Pending', 'Lunas', 'Sebagian']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
