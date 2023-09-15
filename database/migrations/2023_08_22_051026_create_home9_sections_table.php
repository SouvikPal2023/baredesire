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
        Schema::create('home9_sections', function (Blueprint $table) {
            $table->id();
            $table->text('image1')->nullable();
            $table->string('url1')->nullable(); 
            $table->text('image2')->nullable(); 
            $table->string('url2')->nullable();
            $table->text('image3')->nullable();
            $table->string('url3')->nullable();
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
        Schema::dropIfExists('home9_sections');
    }
};
