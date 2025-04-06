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
        Schema::create('user_simulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('simulation_id')->constrained('simulations')->onDelete('cascade');
            $table->foreignId('redaction_id')->nullable()->constrained('redactions')->onDelete('cascade');
            $table->float('languages_codes_technologies')->default(0);
            $table->float('human_sciences_technologies')->default(0);
            $table->float('natural_sciences_technologies')->default(0);
            $table->float('mathematics_technologies')->default(0);
            $table->float('redaction_score')->default(0);
            $table->float('total_score')->default(0);
            $table->integer('total_points')->default(0);
            $table->dateTime('started')->nullable();
            $table->dateTime('finished')->nullable();
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
        Schema::dropIfExists('user_simulations');
    }
};
