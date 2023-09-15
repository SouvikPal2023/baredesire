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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 100)->nullable();
            $table->string('site_logo')->nullable();
            $table->string('light_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('copyright_text', 200)->nullable();
            $table->string('footer_text', 200)->nullable();

            $table->string('meta_title', 100)->nullable();
            $table->string('meta_keyword', 250)->nullable();
            $table->string('meta_description', 400)->nullable();
           
            $table->string('site_email')->nullable();
            $table->char('site_phone')->nullable();
            $table->char('site_whatsapp')->nullable();

            $table->string('contact_title', 100)->nullable();
            $table->string('address')->nullable();
            $table->text('map_link')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
};
