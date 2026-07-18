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
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->string('url');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('social_links')->insert([
            ['platform' => 'facebook', 'url' => 'https://facebook.com', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['platform' => 'linkedin', 'url' => 'https://linkedin.com', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['platform' => 'instagram', 'url' => 'https://instagram.com', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['platform' => 'whatsapp', 'url' => 'https://wa.me/8801642874989', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['platform' => 'github', 'url' => 'https://github.com', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['platform' => 'dribbble', 'url' => 'https://dribbble.com', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
