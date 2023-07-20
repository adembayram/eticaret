<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('description',255);
            $table->string('author',255);
            $table->string('seo_key',255);
            $table->string('phone',25);
            $table->string('mobile',25);
            $table->text('address');
            $table->string('mail',50);
            $table->integer('banner_enable');
            $table->string('banner_text',255);
            $table->string('banner_link');
            $table->string('social_facebook');
            $table->string('social_instagram');
            $table->string('social_twitter');
            $table->string('social_youtube');            
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
        Schema::dropIfExists('settings');
    }
}
