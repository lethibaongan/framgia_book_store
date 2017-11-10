<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatesofbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cates_of_books', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('cate_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('cates_of_books');
    }
}
