<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');//PK
            $table->string('name');
            $table->string('slug')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->integer('article_id')->unsigned();//FK
            
            $table->foreign('article_id')
            ->references('id')
            ->on('articles')
            ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
