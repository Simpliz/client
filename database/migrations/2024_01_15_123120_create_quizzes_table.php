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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('duration');
            $table->unsignedSmallInteger('max_attempts')->nullable();
            $table->enum('status', ['draft', 'published', 'open', 'closed'])->default('draft');
            $table->foreignUlid('created_by')->nullable()
                ->references('id')->on('proctors')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
