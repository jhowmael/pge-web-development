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
        Schema::create('redactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulation_id')->constrained('simulations')->onDelete('cascade');
            $table->string('type', 16);
            $table->string('theme', 255);
            $table->integer('total_points');
            $table->integer('score');
            $table->text('text');
            $table->string('image', 255)->nullable();
            $table->text('correction');
            $table->string('status', 16);
            $table->timestamps();

            // Add index if necessary
            $table->index('simulation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redactions');
    }
};
