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
        Schema::create('product_product_size', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->references('id')
            ->on('products')
            ->onDelete('cascade');
            $table->foreignId('product_size_id')->nullable()->references('id')
            ->on('product_sizes')
            ->onDelete('cascade');
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
        Schema::dropIfExists('product_product_size');
    }
};
