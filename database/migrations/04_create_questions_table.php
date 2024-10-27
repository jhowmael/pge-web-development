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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulation_id')->constrained('simulations')->onDelete('cascade');
            $table->integer('number');
            $table->string('correct_alternative', 1)->nullable();
            $table->string('theme', 255)->nullable();
            $table->text('enunciation')->nullable();
            $table->text('alternative_a')->nullable();
            $table->text('alternative_b')->nullable();
            $table->text('alternative_c')->nullable();
            $table->text('alternative_d')->nullable();
            $table->text('alternative_e')->nullable();
            $table->text('resolution')->nullable();
            $table->string('image')->nullable();
            $table->string('status', 16);
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
        Schema::dropIfExists('questions');
    }
};
