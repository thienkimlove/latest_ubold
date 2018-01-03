<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug');
            $table->string('seo_title')->nullable();
            $table->text('seo_desc')->nullable();

            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('views')->default(0);

            $table->longText('content')->nullable();
            $table->longText('content_tab1')->nullable();
            $table->longText('content_tab2')->nullable();
            $table->longText('content_tab3')->nullable();

            $table->longText('additions')->nullable();

            $table->timestamps();
        });

        Schema::create('product_tag', function(Blueprint $tale)
        {
            $tale->integer('product_id')->unsigned()->index();
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_tag');
    }
}
