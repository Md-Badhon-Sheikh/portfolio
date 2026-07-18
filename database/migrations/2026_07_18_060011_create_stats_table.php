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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('award');
            $table->unsignedInteger('value');
            $table->string('suffix')->nullable();
            $table->string('label');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed the default hero stats so the section isn't empty on a fresh install.
        DB::table('stats')->insert([
            ['icon' => 'award', 'value' => 2, 'suffix' => ' Years', 'label' => 'Experience', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['icon' => 'file-text', 'value' => 55, 'suffix' => '+', 'label' => 'Projects', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['icon' => 'headphones', 'value' => 24, 'suffix' => '/7', 'label' => 'Support', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
