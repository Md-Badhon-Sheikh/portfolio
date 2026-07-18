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
        Schema::create('education_entries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // Newline-separated "Label: value" pairs, e.g. "Institution: XYZ\nGPA: 5.0"
            $table->text('details');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('education_entries')->insert([
            [
                'title' => 'Secondary Education',
                'details' => "Institution: Brother Andre High School, Noakhali\nCertificate: Secondary School Certificate (SSC)\nGPA: 5.0\nGraduated: 2018",
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Higher Secondary Education',
                'details' => "Institution: Noakhali Government College, Noakhali\nCertificate: Higher Secondary Certificate (HSC)\nGPA: 5.0\nGraduated: 2020",
                'sort_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Current Pursuit',
                'details' => "Institution: International University of Business Agriculture and Technology (IUBAT)\nProgram: Bachelor of Science in Computer Science and Engineering (CSE)\nStatus: Enrolled\nExpected Graduation: January 2026",
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
        Schema::dropIfExists('education_entries');
    }
};
