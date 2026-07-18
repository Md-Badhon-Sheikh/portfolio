<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // Comma-separated, e.g. "Laravel, Dashboard" — the first tag is
            // used as the card's category badge; all of them feed the filter buttons.
            $table->string('tags');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('projects')->insert([
            ['title' => 'E-Commerce Platform', 'tags' => 'Laravel, Dashboard', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Portfolio Template', 'tags' => 'UI Design', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Task Manager App', 'tags' => 'JavaScript, Dashboard', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Admin Dashboard', 'tags' => 'PHP, Dashboard', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Restaurant Booking UI', 'tags' => 'UI Design', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Blog & CMS', 'tags' => 'Laravel, PHP', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
