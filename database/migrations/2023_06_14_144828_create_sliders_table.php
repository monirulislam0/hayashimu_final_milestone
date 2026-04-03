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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id()->index();
            $table->string('sorting')->default(0);
            $table->string('name')->index();
            $table->string('title')->nullable;
            $table->string('image')->nullable;
            $table->string('redirect_url')->nullable;
            $table->boolean('status')->default(0);
            $table->boolean('type')->deafult(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
