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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('operator_name');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->double('domestic_call', 8, 4)->nullable();
            $table->double('domestic_sms', 8, 4)->nullable();
            $table->double('domestic_internet', 8, 4)->nullable();
            $table->double('international_call', 8, 4)->nullable();
            $table->double('international_sms', 8, 4)->nullable();
            $table->double('international_internet', 8, 4)->nullable();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
