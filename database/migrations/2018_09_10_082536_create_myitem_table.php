<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('myitem')) {
            Schema::create('myitem', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('price')->nullable();
                $table->string('city_id')->nullable();
                $table->string('categories')->nullable();
                $table->string('address')->nullable();
                $table->text('description')->nullable();
                $table->string('logo')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('myitem0');
    }
}
