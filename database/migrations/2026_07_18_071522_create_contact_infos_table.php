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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('phone');
            $table->string('title');
            $table->string('details');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('contact_infos')->insert([
            ['icon' => 'phone', 'title' => 'Phone', 'details' => '+8801642874989', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'email', 'title' => 'Email', 'details' => 'hello@example.com', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'location', 'title' => 'Address', 'details' => '39/c Monsur Ali Road, Tongi, Gazipur, Bangladesh', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
