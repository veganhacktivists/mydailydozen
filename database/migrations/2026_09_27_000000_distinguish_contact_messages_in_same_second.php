<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_tickets', function (Blueprint $table) {
            $table->dropUnique(['email', 'created_at']);
            $table->char('content_hash', 64)->default('');
            $table->unique(['email', 'created_at', 'content_hash']);
        });
    }

    public function down(): void
    {
        Schema::table('contact_tickets', function (Blueprint $table) {
            $table->dropUnique(['email', 'created_at', 'content_hash']);
            $table->dropColumn('content_hash');
            $table->unique(['email', 'created_at']);
        });
    }
};
