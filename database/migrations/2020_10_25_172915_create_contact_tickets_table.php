<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('message', 500);
            $table->timestamps();

            $table->unique(['email', 'created_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_tickets');
    }
}
