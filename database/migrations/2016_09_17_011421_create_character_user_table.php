<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('character_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
<<<<<<< HEAD
                ->onDelete('cascade');
            $table->foreign('character_id')->references('id')->on('characters')
                ->onDelete('cascade');

//            $table->primary(['user_id', 'character_id']);
=======
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('character_id')->references('id')->on('characters')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'character_id']);
>>>>>>> 722419794345f866fdbd874ca81e10e9225f8e00
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
        Schema::dropIfExists('character_user');
    }
}
