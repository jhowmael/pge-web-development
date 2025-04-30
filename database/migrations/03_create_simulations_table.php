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
        Schema::create('simulations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('type', 16);
            $table->string('edition', 16)->nullable();
            $table->string('year', 4)->nullable();
            $table->string('book', 16)->nullable();
            $table->string('lengague', 16)->nullable();
            $table->integer('minimum_minute');
            $table->integer('total_duration')->nullable();
            $table->integer('quantity_questions');
            $table->string('redaction_theme', 255);
            $table->string('primary_image_redaction')->nullable();
            $table->string('secondary_image_redaction')->nullable();
            $table->text('redaction_introduction');
            $table->integer('total_points');
            $table->text('description')->nullable();
            $table->dateTime('disabled')->nullable();
            $table->string('status', 16);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('simulations');
    }
};
