<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageAndCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {        
            $table->string('image');
            $table->integer('post_category_id')->unsigned()->nullable();
            $table->foreign('post_category_id')->references('id')->on('post_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function ($table) {        
            $table->dropColumn('image');
            $table->dropColumn('post_category_id');
        });
    }
}
