<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('seo_title')->nullable();
            $table->text('seo_desc')->nullable();

            $table->text('question');
            $table->text('answer')->nullable();
            $table->text('short_answer')->nullable();

            $table->string('person')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);

            $table->unsignedInteger('views')->default(0);

            $table->timestamps();
        });

        Schema::create('question_tag', function(Blueprint $tale)
        {
            $tale->integer('question_id')->unsigned()->index();
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
        Schema::dropIfExists('questions');
        Schema::dropIfExists('question_tag');
    }
}
