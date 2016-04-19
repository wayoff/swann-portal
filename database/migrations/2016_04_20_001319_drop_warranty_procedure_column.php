<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropWarrantyProcedureColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->dropColumn(['warranty_procedure']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->integer('warranty_procedure');
        });
    }
}
