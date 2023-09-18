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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('owner_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->string('slug')->unique();
            $table->string('title');
            $table->json('forward_to');
            $table->json('s3')->nullable();
            $table->string('default_email_theme')->nullable();

            $table->string('submission_succeeded')->nullable();
            $table->string('success_redirect_url')->nullable();
            $table->string('branding_option_1')->nullable();
            $table->string('branding_option_2')->nullable();
            $table->string('branding_option_3')->nullable();
            $table->string('branding_option_4')->nullable();

            $table->string('submission_failed')->nullable();
            $table->string('failed_redirect_url')->nullable();

            $table->text('email_logo')->nullable();

            $table->boolean('allowed_domains')->default(0);
            $table->integer('allowed_domains_count')->default(1);

            $table->string('honey_pot')->nullable();

            $table->boolean('recaptcha')->default(0);
            $table->text('recaptcha_secret')->nullable();
            
            $table->boolean('file_upload')->default(0);

            $table->text('blocked_emails')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
