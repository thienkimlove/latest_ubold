<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->index();
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->index();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
