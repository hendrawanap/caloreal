<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_menus', function (Blueprint $table) {
            $table->foreignId('foods_id')->constrained('foods');
            $table->foreignId('menus_id')->constrained('menus');
            $table->string('time');
            $table->integer('quantity');
            $table->primary(['foods_id', 'menus_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods_menus');
    }
}
