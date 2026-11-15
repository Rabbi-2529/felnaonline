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
        Schema::create('home_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('bandwidth');
            $table->string('feature_one');
            $table->string('feature_two');
            $table->string('feature_three');
            $table->string('feature_four');
            $table->integer('price');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_packages');
    }
};
