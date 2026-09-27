<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUserTable extends Migration
{
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('checked');
            $table->date('recorded_at');

            $table->unique(['group_id', 'user_id', 'recorded_at']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('group_user');
    }
}
