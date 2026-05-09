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
        Schema::create('partner_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo');
            $table->string('link');
            $table->string('link_label')->default('Visit');
            $table->boolean('status')->default(true);
            $table->integer('sorting')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_sliders');
    }
};
