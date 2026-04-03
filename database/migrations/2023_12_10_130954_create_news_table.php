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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->enum('news_type',[1,2,3,4]);
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('short')->nullable();
            $table->longText('detail')->nullable();
            $table->string('published_date')->nullable();
            $table->string('author')->nullable();
            $table->string('origin')->nullable();
            $table->integer('sorting')->default(1);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
