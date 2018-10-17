<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1511173734CompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('price')->nullable();
                $table->string('city_id')->nullable();
                $table->string('user_id')->nullable();
                $table->string('subcategories')->nullable();
                $table->string('address')->nullable();
                $table->text('description')->nullable();
                $table->string('logo')->nullable();
                $table->string('logo1')->nullable();
                $table->string('logo2')->nullable();
                $table->string('logo3')->nullable();

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
        Schema::dropIfExists('companies');
    }
}
