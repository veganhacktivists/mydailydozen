<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
        });

        // Carries over whoever ADMIN_EMAIL names today; from here on only the flag counts
        if ($email = config('app.admin_email')) {
            DB::table('users')->whereRaw('lower(email) = ?', [strtolower($email)])->update(['is_admin' => true]);
        }
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
