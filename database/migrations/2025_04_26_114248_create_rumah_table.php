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
        Schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_rumah');
            $table->enum('status_rumah', ['dihuni', 'tidak']);
            $table->unsignedBigInteger('current_penghuni_id')->nullable();
            $table->timestamps();

            $table->foreign('current_penghuni_id')->references('id')->on('penghuni')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumah');
    }
};
