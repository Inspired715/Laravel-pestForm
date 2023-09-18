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
        Schema::table('forms', function (Blueprint $table) {
            $table->after('file_upload', function (Blueprint $table) {
                $table->boolean('s3_file_upload')->default(false);
            });
            $table->json('local_file')->nullable()->after('s3');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('s3_file_upload');
            $table->dropColumn('local_file');
        });
    }
};
