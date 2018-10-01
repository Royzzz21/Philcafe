<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1511174113CompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            if(Schema::hasColumn('companies', 'city_id')) {
                $table->dropColumn('city_id');
            }
            if(Schema::hasColumn('companies', 'subcategories')) {
                $table->dropColumn('subcategories');
            }
            if (!Schema::hasColumn('companies', 'logo')) {
                $table->string('logo');
                }
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
                        $table->string('city_id')->nullable();
                $table->string('subcategories')->nullable();
                $table->dropColumn('logo');
                
        });

    }
}
