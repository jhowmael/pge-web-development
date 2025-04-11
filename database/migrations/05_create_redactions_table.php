<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('redactions', function (Blueprint $table) {
            $table->id();
            $table->string('type', 16);
            $table->string('theme', 255);
            $table->text('introduction');
            $table->decimal('clarity_score', 5, 2)->nullable()->default(0.00);
            $table->decimal('spelling_score', 5, 2)->nullable()->default(0.00);
            $table->decimal('argumentation_score', 5, 2)->nullable()->default(0.00);
            $table->decimal('structure_score', 5, 2)->nullable()->default(0.00);
            $table->decimal('cohesion_score', 5, 2)->nullable()->default(0.00);
            $table->integer('total_points')->nullable();
            $table->integer('score')->nullable();
            $table->text('text')->nullable();
            $table->string('image', 255)->nullable();
            $table->text('correction')->nullable();
            $table->string('status', 16);
            $table->dateTime('corrected')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('redactions');
    }
};
