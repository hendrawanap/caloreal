<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_table', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('food_id');
            $table->foreignId('user_id');
            $table->string('menu_name');
            $table->integer('total_calorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_table');
    }
}
