<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryMyitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('subcategory_myitem')) {
            Schema::create('subcategory_myitem', function (Blueprint $table) {
                $table->integer('subcategory_id')->unsigned()->nullable();
                $table->foreign('subcategory_id', 'fk_p_91029_91033_myitem__5a12afe2d2772')->references('id')->on('subcategories')->onDelete('cascade');
                $table->integer('myitem_id')->unsigned()->nullable();
                $table->foreign('myitem_id', 'fk_p_91033_91029_subcategory_5a12afe2d27f0')->references('id')->on('myitem')->onDelete('cascade');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategory_myitem');
    }
}
