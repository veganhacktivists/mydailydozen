<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoColumnToDetailTypesTable extends Migration
{
    public function up()
    {
        Schema::table('detail_types', function (Blueprint $table) {
            $table->mediumText('info')->nullable();
        });
    }

    public function down()
    {
        Schema::table('detail_types', function (Blueprint $table) {
            $table->dropColumn('info');
        });
    }
}
