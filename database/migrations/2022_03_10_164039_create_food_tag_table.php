<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_food', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("tags_id");
            $table->foreign("tags_id")->references("id")->on("tags")->onDelete('cascade');;

            $table->unsignedBigInteger("food_id");
            $table->foreign("food_id")->references("id")->on("foods")->onDelete('cascade');;

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
        Schema::dropIfExists('tags_food');
    }
}
