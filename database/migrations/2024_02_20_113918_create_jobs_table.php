<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('context');
            $table->enum('workplace', ['on-site', 'remote', 'hybrid']);
            $table->string('location');
            $table->text('educational_requirement');
            $table->text('experience_requirement');
            $table->text('additional_requirement')->nullable();
            $table->text('benefits')->nullable();
            $table->enum('type', ['full-time', 'part-time', 'internship', 'contract']);
            $table->decimal('salary', 10, 2);
            $table->timestamp('deadline');
            $table->enum('status', ['approved', 'pending', 'rejected', 'closed', 'cancelled'])->default('pending');
            $table->timestamp('approved_at')->nullable();
            $table->string('skills')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
