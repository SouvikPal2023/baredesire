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
        Schema::create('home6_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('sub_heading')->nullable();

            $table->text('image1')->nullable();
            $table->string('image1_heading')->nullable();
            $table->string('image1_text')->nullable();

            $table->text('image2')->nullable();
            $table->string('image2_heading')->nullable();
            $table->string('image2_text')->nullable();

            $table->text('image3')->nullable();
            $table->string('image3_heading')->nullable();
            $table->string('image3_text')->nullable();

            $table->text('image4')->nullable();
            $table->string('image4_heading')->nullable();
            $table->string('image4_text')->nullable();
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
        Schema::dropIfExists('home6_sections');
    }
};
