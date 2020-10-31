<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->string('article_id',255)->primary();
            $table->string('article_name',255)->unique();
            $table->string('article_image',255);
            $table->string('article_short_des', 255)->nullable();
            $table->text('article_content')->nullable();
            $table->string('seo_keywords', 255)->nullable();
            $table->string('seo_des', 255)->nullable();
            $table->string('seo_img', 255)->nullable();
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
        Schema::dropIfExists('articles');
    }
}
