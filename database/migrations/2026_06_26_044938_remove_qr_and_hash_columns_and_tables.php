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
        Schema::dropIfExists('document_verifications');

        Schema::table('letters', function (Blueprint $table) {
            $table->dropColumn(['qr_code', 'verification_code', 'sha256_hash']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('letters', function (Blueprint $table) {
            $table->string('qr_code')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('sha256_hash')->nullable();
        });

        Schema::create('document_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('letter_id')->constrained()->cascadeOnDelete();
            $table->string('sha256_hash')->unique();
            $table->string('verification_url');
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->integer('verified_count')->default(0);
            $table->timestamp('last_verified_at')->nullable();
            $table->string('last_verified_ip')->nullable();
            $table->timestamps();
        });
    }
};
