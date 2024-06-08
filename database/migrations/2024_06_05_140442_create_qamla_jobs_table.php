<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qamla_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('qamla_job_category_id');
            $table->string('qamla_job_title_id');
            $table->date('deadline');
            $table->decimal('min_salary', 10, 2)->nullable();
            $table->decimal('max_salary', 10, 2)->nullable();
            $table->integer('vacancy')->nullable();
            $table->string('location')->nullable();
            $table->text('educational_requirement')->nullable();
            $table->text('experience_requirement')->nullable();
            $table->text('additional_requirement')->nullable();
            $table->text('responsibilities');
            $table->text('benefits')->nullable();
            $table->boolean('is_negotiable')->default(false);
            $table->boolean('is_employed')->default(false);
            $table->boolean('is_published')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            // $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qamla_jobs');
    }
};
