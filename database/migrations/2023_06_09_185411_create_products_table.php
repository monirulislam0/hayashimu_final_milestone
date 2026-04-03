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
            $table->string('name');
            $table->string('slug');
            $table->mediumText('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('small_image')->nullable();
            $table->string('detail_image')->nullable();
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->float('stock')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('new_item')->default(0);
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
