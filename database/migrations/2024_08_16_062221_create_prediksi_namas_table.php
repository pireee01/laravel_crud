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
        Schema::create('prediksi_namas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->string('nama');
            $table->string('negara_1');
            $table->string('negara_2')->nullable();
            $table->string('negara_3')->nullable();
            $table->string('negara_4')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksi_namas');
    }
};