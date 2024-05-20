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
        Schema::create('app_books', function (Blueprint $table) {
            $table->uuid();
            $table->timestamps();
            $table->string('title')->default('')->nullable();
            $table->string('publisher')->default('')->nullable();
            $table->string('author')->default('')->nullable();
            $table->string('genre')->default('')->nullable();
            $table->string('amount')->default('')->nullable();
            $table->string('price')->default('')->nullable();
            $table->date('publication')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_books');
    }
};
