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
            $table->string('year', 4);
            $table->integer('minimum_minute');
            $table->integer('total_duration')->nullable();
            $table->integer('quantity_questions');
            $table->string('redaction_theme', 255)->nullable();
            $table->integer('total_points');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('simulations');
    }
};
