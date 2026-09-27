<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// in_use was never read, and teams are off
return new class extends Migration
{
    public function up()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->dropColumn('in_use');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('current_team_id');
        });
    }

    public function down()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->boolean('in_use')->default(true);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('current_team_id')->nullable();
        });
    }
};
