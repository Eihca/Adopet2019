<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricePictureToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 8, 2);
			//$table->binary('photo');//Laravel only supports  64 KB max
			$table->string('photo_mime')->nullable();
        });
		
		DB::statement("ALTER TABLE products ADD photo MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
			$table->dropColumn('photo');
			$table->dropColumn('photo_mime');
			
        });
    }
}
