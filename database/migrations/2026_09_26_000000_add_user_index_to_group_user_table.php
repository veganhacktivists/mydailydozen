<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->index(['user_id', 'recorded_at']);
        });
    }

    public function down()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'recorded_at']);
        });
    }
};
