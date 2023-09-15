<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique()->nullable();
            $table->foreignId('user_id')->nullable()->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->string('total_price')->nullable();
            $table->string('coupon_code')->nullable();
            $table->enum('payment_status', ['pending','confirmed','cancelled'])->default("pending");
            $table->string('payment_method')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('tracking_number')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['order_placed','in_transit', 'cancelled','completed'])->default("order_placed");
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
