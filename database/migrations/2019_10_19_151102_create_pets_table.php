<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('pet_class');
			$table->string('pet_name');
			$table->decimal('pet_price', 8, 2);
			$table->text('pet_char');
			$table->text('pet_envi')->nullable();
			$table->text('pet_life')->nullable();
			$table->text('pet_pic');
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
        Schema::dropIfExists('pets');
    }
}
