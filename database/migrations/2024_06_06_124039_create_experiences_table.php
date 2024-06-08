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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->string('title');
            $table->text('responsibilities');
            $table->string('employment_type');
            $table->string('employer');
            $table->string('contacts');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_currently_working')->default(false);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
