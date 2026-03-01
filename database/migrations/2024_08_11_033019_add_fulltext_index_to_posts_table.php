<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (config('database.default') === 'mysql') {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropFullText(['title', 'subheading']);
                $table->fullText(['title', 'subheading', 'content']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (config('database.default') === 'mysql') {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropFullText(['title', 'subheading', 'content']);
                $table->fullText(['title', 'subheading']);
            });
        }
    }
};
