<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keywords', function( Blueprint $table) {
            $table->dropColumn(['keywordable_id', 'keywordable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keywords', function( Blueprint $table) {
            $table->integer('keywordable_id');
            $table->string('keywordable_type');
        });
    }
}
