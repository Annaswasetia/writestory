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
        Schema::create('puisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title'); // Judul puisi
            $table->longText('content')->nullable(); // Konten puisi
            $table->enum('category', ['cerpen', 'puisi'])->default('puisi'); // Kategori
            $table->boolean('is_published')->default(false); // Status publikasi
            $table->timestamps();

            // Menambahkan kolom karya_id
            $table->unsignedBigInteger('karya_id');

            // Menambahkan foreign key
            $table->foreign('karya_id')->references('id')->on('karya')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puisi');
    }
};
