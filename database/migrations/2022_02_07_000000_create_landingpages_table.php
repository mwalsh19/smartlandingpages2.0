<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('template_id')->default(0);
            $table->integer('client_id')->nullable();
            $table->string('path');
            $table->string('publisher')->nullable();
            $table->string('title')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('referral_code_intelliapp')->nullable();
            $table->string('main_title')->nullable();
            $table->text('main_description')->nullable();
            $table->text('benef1_caption')->nullable();
            $table->text('benef2_caption')->nullable();
            $table->text('benef3_caption')->nullable();
            $table->text('benef4_caption')->nullable();
            $table->text('benef5_caption')->nullable();
            $table->text('benef6_caption')->nullable();
            $table->string('benef1_figure')->nullable();
            $table->string('benef2_figure')->nullable();
            $table->string('benef3_figure')->nullable();
            $table->string('benef4_figure')->nullable();
            $table->string('benef5_figure')->nullable();
            $table->string('benef6_figure')->nullable();
            $table->string('benef1_caption_title')->nullable();
            $table->string('benef2_caption_title')->nullable();
            $table->string('benef3_caption_title')->nullable();
            $table->string('benef4_caption_title')->nullable();
            $table->string('benef5_caption_title')->nullable();
            $table->string('benef6_caption_title')->nullable();
            $table->text('body_copy')->nullable();
            $table->string('phone')->nullable();
            $table->string('background')->nullable();
            $table->string('background_mobile')->nullable();
            $table->string('body_image_2')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('region_graphic')->nullable();
            $table->string('region_graphic_mobile')->nullable();
            $table->string('body_image_4')->nullable();
            $table->text('body_image_4_title')->nullable();
            $table->string('ga_lp')->nullable();
            $table->string('ga_tp')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
