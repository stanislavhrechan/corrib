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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('floor_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('slug')->unique();

            $table->decimal('size', 8, 2)->nullable();
            $table->text('coords')->nullable();

            $table->string('status')->default('available');

            $table->string('image_path')->nullable();
            $table->integer('rooms_count')->default(0);
            $table->decimal('total_area', 8, 2)->nullable();

            $table->text('info')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
