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
            $table->string('correct_alternative', 1);
            $table->string('theme', 255);
            $table->text('enunciation');
            $table->text('alternative_a');
            $table->text('alternative_b');
            $table->text('alternative_c');
            $table->text('alternative_d');
            $table->text('alternative_e');
            $table->text('resolution');
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
