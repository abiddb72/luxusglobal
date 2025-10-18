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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique(); // 1=international,2=domestic,3=group,4=umrah,5=hajj,6=other
            $table->string('slug')->unique();
            $table->string('feature_image')->nullable();
            $table->tinyInteger('type'); //1=packages,2=religion,3=events;
            $table->integer('sort')->default(1);
            $table->boolean('status')->default(1); // 1-show, 0-hide
            $table->boolean('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
