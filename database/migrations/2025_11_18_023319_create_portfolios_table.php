<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();

            $table->enum('category', ['Website', 'Mobile App', 'Design', 'Video', 'Other'])
                  ->default('Other');

            $table->string('client')->nullable();
            $table->text('description')->nullable();

            $table->integer('year')->nullable();

            $table->string('project_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('gallery')->nullable();

            $table->json('technologies')->nullable();
            $table->json('features')->nullable();
            $table->json('results')->nullable();

            $table->enum('status', ['ongoing', 'completed'])->default('completed');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
