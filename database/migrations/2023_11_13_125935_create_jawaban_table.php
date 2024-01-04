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
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("soal_id");
            $table->unsignedBigInteger("opsi_pilihan_ganda_id")->nullable();
            $table->unsignedBigInteger("jawaban_statement_id")->nullable();
            $table->string('jawaban_essay')->nullable();
            $table->integer('jawaban_berupa_angka')->nullable();
            $table->unsignedBigInteger("user_id");
            
            
            $table->foreign('soal_id')->references('id')->on('soal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('opsi_pilihan_ganda_id')->references('id')->on('opsi_pilihan_ganda')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jawaban_statement_id')->references('id')->on('jawaban_statement')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban');
    }
};
