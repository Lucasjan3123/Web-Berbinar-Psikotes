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
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("test_id")->nullable();
            $table->unsignedBigInteger("modul_id")->nullable();
            $table->unsignedBigInteger("section_id")->nullable();
            $table->string('pertanyaan');
            $table->string('jawaban_benar');
            
            $table->foreign('test_id')->references('id')->on('test')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('modul_id')->references('id')->on('modul')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal');
    }
};
