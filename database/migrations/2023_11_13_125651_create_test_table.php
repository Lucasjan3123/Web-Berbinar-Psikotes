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
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('nama_test');
            $table->date('tanggal');
            $table->string('waktu_tes');
            $table->integer('total_soal_perTes');
            $table->unsignedBigInteger("tipe_test_id");
            $table->foreign('tipe_test_id')->references('id')->on('tipe_test')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test');
    }
};
