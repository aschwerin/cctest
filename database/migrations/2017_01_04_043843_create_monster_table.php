<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonsterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monsters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('name');
            $table->enum('class', ['Barbarian', 'Bard', 'Cleric', 'Druid', 'Fighter', 'Monk', 'Paladin', 'Ranger', 'Rogue', 'Sorcerer', 'Warlock', 'Wizard']);
            $table->smallInteger('level')->nullable();
            $table->enum('race', ['Dragonborn', 'Drow', 'Dwarf', 'Elf', 'Gnome', 'Half-Elf', 'Half-Orc', 'Halfling', 'Human', 'Tiefling', 'Orc', 'Troll', 'Ogre', 'Imp', 'Demon', 'Dragon']);
            $table->enum('alignment', ['Lawful good', 'Neutral good', 'Chaotic good', 'Lawful neutral', 'True neutral', 'Chaotic neutral', 'Lawful evil', 'Neutral evil', 'Chaotic evil']);
            $table->integer('exp')->nullable();
            $table->tinyInteger('str')->nullable();
            $table->tinyInteger('dex')->nullable();
            $table->tinyInteger('con')->nullable();
            $table->tinyInteger('int')->nullable();
            $table->tinyInteger('wis')->nullable();
            $table->tinyInteger('cha')->nullable();
            $table->tinyInteger('str_save')->nullable();
            $table->tinyInteger('dex_save')->nullable();
            $table->tinyInteger('con_save')->nullable();
            $table->tinyInteger('int_save')->nullable();
            $table->tinyInteger('wis_save')->nullable();
            $table->tinyInteger('cha_save')->nullable();
            $table->tinyInteger('armor')->nullable();
            $table->tinyInteger('initiative')->nullable();
            $table->tinyInteger('speed')->nullable();
            $table->smallInteger('hit_points')->nullable();
            $table->text('equipment')->nullable();
            $table->text('other_proficiencies_langs')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('monsters');
    }
}
