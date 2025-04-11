<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('correct_alternative', 1)->nullable();
            $table->string('theme', 255)->nullable();
            $table->string('image')->nullable();
            $table->text('enunciation')->nullable();
            $table->text('alternative_a')->nullable();
            $table->text('alternative_b')->nullable();
            $table->text('alternative_c')->nullable();
            $table->text('alternative_d')->nullable();
            $table->text('alternative_e')->nullable();
            $table->string('alternative_a_image')->nullable();
            $table->string('alternative_b_image')->nullable();
            $table->string('alternative_c_image')->nullable();
            $table->string('alternative_d_image')->nullable();
            $table->string('alternative_e_image')->nullable();
            $table->text('resolution')->nullable();
            $table->string('status', 16);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
