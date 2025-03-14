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
        Schema::create('service_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('apart_id')->nullable(true);
            $table->foreign('apart_id')->references('id')->on('apartments')->nullOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('service_id')->nullable(true);
            $table->foreign('service_id')->references('id')->on('services')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_registrations');
    }
};
