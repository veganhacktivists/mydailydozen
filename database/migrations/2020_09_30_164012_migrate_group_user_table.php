<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrateGroupUserTable extends Migration
{
    public function up()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->boolean('in_use')->default(true);
            $table->integer('checked')->default(0)->change();
        });

        Schema::create('use_tracker', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');

            $table->unique(['group_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->dropColumn('in_use');
            $table->integer('checked')->change();
        });

        Schema::drop('use_tracker');
    }
}
