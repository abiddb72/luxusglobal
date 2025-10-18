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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained('categories')->onDelete('cascade');
            $table->boolean('is_featured')->default(0);
            $table->string('title')->unique();
            $table->string('slug')->nullable()->unique();
            $table->decimal('price', 10, 2);
            $table->longText('description');
            $table->longText('package_included')->nullable();
            $table->longText('package_summary')->nullable();
            $table->longText('package_exclusions')->nullable();
            $table->longText('terms_condition')->nullable();
            $table->string('image')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('departure_country')->nullable();
            $table->string('departure_city')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('destination_city')->nullable();
            $table->integer('min_person_allowed')->default(2);
            $table->boolean('ticket')->default(0);
            $table->boolean('visa')->default(0);
            $table->boolean('insurance')->default(0);
            $table->string('stay')->default('10 Days');
            $table->string('hotel_choice')->default('3 Star');
            $table->string('company')->default('Luxus Global');
            $table->tinyInteger('rate_mentioned')->default(1); // 1=per head, 2=group
            $table->date('expire_date')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_delete')->default(0);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
