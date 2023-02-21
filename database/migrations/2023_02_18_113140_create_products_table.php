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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category-id');
            $table->foreign('category-id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('owner-id');
            $table->foreign('owner-id')->references('id')->on('users')->onDelete('cascade');
            $table->text('title');
            $table->text('description');
            $table->char('demo-url');
            $table->char('thumbnail-url');
            $table->char('source-url');
            $table->unsignedInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
