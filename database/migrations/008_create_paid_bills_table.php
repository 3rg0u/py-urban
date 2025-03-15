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
        Schema::create('paid_bills', function (Blueprint $table) {
            $table->id();
            $table->timestamp('paid_date')->nullable(true);
            $table->unsignedBigInteger('bill_id')->nullable(true);
            $table->foreign('bill_id')->references('id')->on('bills')->nullOnDelete()->cascadeOnUpdate();
            $table->string('apart_id')->nullable(true);
            $table->foreign('apart_id')->references('id')->on('apartments')->nullOnDelete()->cascadeOnUpdate();
            $table->boolean('state')->default(false);
            $table->double('price')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paid_bills');
    }
};
