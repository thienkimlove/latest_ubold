<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('seo_title')->nullable();
            $table->text('seo_desc')->nullable();

            $table->string('url')->nullable();
            $table->text('code')->nullable();


            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('views')->default(0);

            $table->timestamps();
        });

        Schema::create('tag_video', function(Blueprint $tale)
        {
            $tale->integer('video_id')->unsigned()->index();
            $tale->integer('tag_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
        Schema::dropIfExists('tag_video');
    }
}
