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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rumah_id');
            $table->unsignedBigInteger('penghuni_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->enum('jenis_iuran', ['satpam', 'kebersihan']);
            $table->integer('jumlah')->nullable();
            $table->enum('status_pembayaran', ['lunas', 'belum']);
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();

            $table->foreign('rumah_id')->references('id')->on('rumah')->onDelete('cascade');
            $table->foreign('penghuni_id')->references('id')->on('penghunis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
