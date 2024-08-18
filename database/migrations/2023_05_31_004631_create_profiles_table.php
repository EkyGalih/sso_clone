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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->string('number_phone')->nullable();
            $table->timestamp('number_phone_verified_at')->nullable();
            $table->string('number_whatsapp')->nullable();
            $table->timestamp('number_whatsapp_verified_at')->nullable();
            $table->string('email_recovery')->nullable();
            $table->timestamp('email_recovery_verified_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
