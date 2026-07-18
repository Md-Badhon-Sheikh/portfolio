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
            $table->string('designation')->nullable()->after('name');
            $table->text('bio')->nullable()->after('designation');
            $table->string('cv')->nullable()->after('avatar');
            $table->string('contact_link')->nullable()->after('cv');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['designation', 'bio', 'cv', 'contact_link']);
        });
    }
};
