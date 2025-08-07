<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_identifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('plant_category_id')->nullable()->constrained()->onDelete('set null');
            $table->string('image')->nullable(); // path to uploaded image
            $table->string('plant_name')->nullable();
            $table->string('common_name')->nullable();
            $table->string('scientific_name')->nullable();
            $table->string('disease_name')->nullable();
            $table->decimal('confidence_level', 5, 2)->nullable(); // e.g. 95.50%
            $table->string('health_status')->nullable();
            $table->string('family')->nullable();
            $table->string('native_region')->nullable();
            $table->string('water_needs')->nullable();
            $table->string('sunlight_needs')->nullable();
            $table->string('toxicity')->nullable();
            $table->text('care_recommendation')->nullable();
            $table->timestamp('identified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_identifications');
    }
};