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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            $table->foreignId('form_id')
                ->references('id')
                ->on('forms')
                ->cascadeOnDelete();

            $table->json('data');
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->boolean('spam')->default(false);
            $table->boolean('archived')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
