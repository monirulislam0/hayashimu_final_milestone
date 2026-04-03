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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sorting')->default(0);
            $table->string('slug')->unique();
            $table->unsignedBigInteger('parent_id')->default(1)->nullable();
            $table->longText('description')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('menu')->default(0);
            $table->boolean('left_menu')->default(0);
            $table->string('image')->nullable();
            $table->string('hover_image')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
