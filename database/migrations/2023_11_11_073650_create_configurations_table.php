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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_short_name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('logo')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade')->default(1);
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
