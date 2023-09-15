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
        Schema::create('home2_sections', function (Blueprint $table) {
            $table->id();
            $table->text('image1')->nullable();
            $table->string('btn1_text')->nullable();
            $table->string('btn1_url')->nullable();

            $table->text('image2')->nullable();
            $table->string('btn2_text')->nullable();
            $table->string('btn2_url')->nullable();

            $table->text('image3')->nullable();
            $table->string('btn3_text')->nullable();
            $table->string('btn3_url')->nullable();

            $table->text('image4')->nullable();
            $table->string('btn4_text')->nullable();
            $table->string('btn4_url')->nullable();

            $table->text('btn_image')->nullable();
            
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
        Schema::dropIfExists('home2_sections');
    }
};
