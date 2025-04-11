<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_simulations', function (Blueprint $table) {
            $table->id(); 
            $table->float('languages_codes_technologies', 6, 2)->nullable()->default(0.00);
            $table->float('human_sciences_technologies', 6, 2)->nullable()->default(0.00);
            $table->float('natural_sciences_technologies', 6, 2)->nullable()->default(0.00);
            $table->float('mathematics_technologies', 6, 2)->nullable()->default(0.00);
            $table->float('redaction_score')->default(0);
            $table->float('total_score')->default(0);
            $table->integer('total_points')->default(0);
            $table->dateTime('started')->nullable();
            $table->dateTime('finished')->nullable();
            $table->string('status', 16);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_simulations');
    }
};
