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
        Schema::create('plant_diaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_type_id')->constrained()->onDelete('cascade');
            $table->text('plant_note')->nullable();
            $table->string('image')->nullable();
            $table->dateTime('diary_at');
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
        Schema::dropIfExists('plant_diaries');
    }
};
