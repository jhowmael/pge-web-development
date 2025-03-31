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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('type', 16);
            $table->string('theme', 255);
            $table->text('introduction');
            $table->integer('total_points')->nullable();
            $table->integer('score')->nullable();
            $table->text('text')->nullable();
            $table->string('image', 255)->nullable()->nullable();
            $table->text('correction')->nullable();
            $table->string('status', 16);
            $table->datetime('corrected')->nullable();
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
