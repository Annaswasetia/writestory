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
        Schema::create('cerpen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('title'); // Judul cerpen
            $table->longText('content', 5000)->nullable(); // Konten cerpen
            $table->enum('category', ['cerpen', 'puisi'])->default('cerpen'); // Kategori
            $table->boolean('is_published')->default(false); // Status publikasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cerpen');
    }
};
