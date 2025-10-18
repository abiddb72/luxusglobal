<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('country_title')->unique();
            $table->string('slug')->unique();
            $table->string('country_image')->nullable();
            $table->string('feature_image')->nullable();
            $table->longText('visa_description')->nullable();
            $table->longText('embassy_requirements')->nullable();
            $table->longText('duration_description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
