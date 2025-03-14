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
        Schema::create('residents', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->enum('host', ['host', 'member'])->default('member');
            $table->string('name')->nullable(false);
            $table->string('apart_id')->nullable(true);
            $table->foreign('apart_id')->references('id')->on('apartments')->nullOnDelete()->cascadeOnUpdate();
            $table->string('email')->nullable(true)->default(null);
            $table->foreign('email')->references('email')->on('users')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
