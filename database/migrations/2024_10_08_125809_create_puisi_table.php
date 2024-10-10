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
            $table->longText('content', 5000)->nullable(); // Konten puisi
            $table->enum('category', ['cerpen', 'puisi'])->default('puisi'); // Kategori
            $table->boolean('is_published')->default(false); // Status publikasi
            $table->timestamps();
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
