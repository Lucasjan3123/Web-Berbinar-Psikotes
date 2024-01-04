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
        Schema::create('jawaban_statement', function (Blueprint $table) {
            $table->id();
            $table->string('statement_text');
            $table->unsignedBigInteger("soal_id");
            $table->integer('point');

            $table->foreign('soal_id')->references('id')->on('soal')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_statement');
    }
};
