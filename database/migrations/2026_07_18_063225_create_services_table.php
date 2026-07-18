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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('design');
            $table->string('color')->default('text-orange-600');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed the default services so the section isn't empty on a fresh install.
        $now = now();
        DB::table('services')->insert([
            ['icon' => 'design', 'color' => 'text-orange-600', 'title' => 'UI/UX Design', 'description' => 'Creating intuitive and visually appealing interfaces to enhance user experience and engagement.', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'code', 'color' => 'text-green-500', 'title' => 'Web Development', 'description' => 'Building responsive, fast, and modern websites tailored to your specific business needs and goals.', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'server', 'color' => 'text-purple-500', 'title' => 'Laravel Development', 'description' => 'Developing scalable, secure, and maintainable web applications using the Laravel framework.', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'api', 'color' => 'text-orange-600', 'title' => 'API Development', 'description' => 'Designing and building robust RESTful APIs that connect your applications and services seamlessly.', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'database', 'color' => 'text-green-500', 'title' => 'Database Design', 'description' => 'Structuring efficient, normalized databases that keep your application fast and reliable at scale.', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'device', 'color' => 'text-purple-500', 'title' => 'Responsive Design', 'description' => 'Ensuring your website looks and performs beautifully across desktop, tablet, and mobile devices.', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
