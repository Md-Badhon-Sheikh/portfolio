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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('level');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('skills')->insert([
            ['name' => 'Laravel', 'level' => 90, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PHP', 'level' => 88, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'JavaScript', 'level' => 82, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'jQuery', 'level' => 85, 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tailwind CSS', 'level' => 92, 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MySQL', 'level' => 80, 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Git', 'level' => 85, 'sort_order' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'REST API', 'level' => 83, 'sort_order' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Responsive Design', 'level' => 95, 'sort_order' => 9, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
