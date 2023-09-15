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
        Schema::create('home7_sections', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('heading')->nullable();
            $table->string('desc')->nullable();
            $table->string('btn_text')->nullable();
            $table->text('btn_url')->nullable();
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
        Schema::dropIfExists('home7_sections');
    }
};