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
        Schema::create('home3_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();

            $table->text('image1')->nullable();
            $table->string('image1_text')->nullable();
            $table->string('btn1_text')->nullable();
            $table->string('btn1_url')->nullable();

            $table->text('image2')->nullable();
            $table->string('image2_text')->nullable();
            $table->string('btn2_text')->nullable();
            $table->string('btn2_url')->nullable();

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
        Schema::dropIfExists('home3_sections');
    }
};
