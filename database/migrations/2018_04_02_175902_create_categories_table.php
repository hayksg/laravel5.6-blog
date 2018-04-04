<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->unsigned(); // All foreign keys must be unsigned
            $table->string('name')->unique();
            $table->string('is_visible')->nullable()->default('on');
            $table->tinyInteger('category_order')->unsigned(); // if unsigned range 0 to 255, without unsigned range -128 to 127 
            $table->timestamps();
            $table->index('parent_id');
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
