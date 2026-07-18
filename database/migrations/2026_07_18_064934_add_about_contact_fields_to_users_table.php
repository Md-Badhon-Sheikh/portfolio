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
        Schema::table('users', function (Blueprint $table) {
            $table->text('about_bio')->nullable()->after('bio');
            // Newline-separated short items, e.g. "Clean Code\nResponsive Design"
            $table->text('about_highlights')->nullable()->after('about_bio');
            $table->string('phone')->nullable()->after('contact_link');
            $table->string('address')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['about_bio', 'about_highlights', 'phone', 'address']);
        });
    }
};
