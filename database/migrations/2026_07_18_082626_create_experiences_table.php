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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('period');
            $table->string('role');
            $table->string('company');
            $table->text('description');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('experiences')->insert([
            [
                'period' => '2024 — Present',
                'role' => 'Freelance Web Developer',
                'company' => 'Self-employed',
                'description' => 'Designing and building responsive websites and web applications for clients using Laravel, PHP, and modern front-end tooling.',
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'period' => '2023 — 2024',
                'role' => 'Junior Laravel Developer',
                'company' => 'Company Name',
                'description' => 'Contributed to building and maintaining web applications, working with a team to ship features and fix bugs in a Laravel-based codebase.',
                'sort_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'period' => '2022 — 2023',
                'role' => 'Web Development Intern',
                'company' => 'Company Name',
                'description' => 'Assisted in developing responsive UI components and learned real-world development workflows, version control, and code review practices.',
                'sort_order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
