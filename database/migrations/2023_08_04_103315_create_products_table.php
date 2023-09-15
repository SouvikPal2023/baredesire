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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->double('original_price', 10, 2)->nullable(); 
            $table->double('selling_price', 10, 2)->nullable(); 
            $table->text('description')->nullable();
            $table->text('wash')->nullable();
            $table->text('additional')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_featured')->default(1);
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
        Schema::dropIfExists('products');
    }
};
