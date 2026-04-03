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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('shipping_id');
            $table->string('order_no')->index();
            $table->enum('shipping_method',['Delivery','Take-away'])->default('Delivery');
            $table->enum('payment_method',['COD','SSL','Bikash','Rocket','Nagad'])->default('COD');
            $table->enum('payment_status',['Initiated','Pending','Paid'])->default('Pending');
            $table->enum('order_status',['Pending','Accepted','Processing','Shipped','Delivered','Canceled'])->default('Pending');
            $table->float('sub_total')->default(0);
            $table->float('tax')->default(0);
            $table->float('delivery_charge')->default(0);
            $table->float('grand_total')->default(0);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
