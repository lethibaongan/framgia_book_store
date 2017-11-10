<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('publisher_id');
            $table->string('image', 255);
            $table->longText('description');
            $table->double('price');
            $table->integer('publish_year');
            $table->unsignedInteger('discount_id');
            $table->integer('quantity');
            $table->float('avg_rate');
            $table->integer('total_people_rate');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
