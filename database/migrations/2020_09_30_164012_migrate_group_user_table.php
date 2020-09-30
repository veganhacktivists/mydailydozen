<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrateGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->boolean('in_use')->default(true);
            $table->integer('checked')->default(0)->change();
        });

        // We need a separate pivot table to track what the user is currently monitoring.
        // Otherwise that'll be a column in a table with hundreds to thousands of rows.
        Schema::create('use_tracker', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('in_use');

            $table->unique(['group_id', 'user_id', 'in_use']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->dropColumn('in_use');
            $table->integer('checked')->change();
        });

        Schema::drop('use_tracker');
    }
}
