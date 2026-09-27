<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubtitleColumnToGroupsTable extends Migration
{
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->string('subtitle')->nullable();
        });
    }

    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('subtitle');
        });
    }
}
