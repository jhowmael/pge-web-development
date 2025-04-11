<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('type', 16);
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('phone', 16)->nullable();
            $table->string('profile_picture')->nullable();
            $table->boolean('premium')->default(false);
            $table->decimal('simulation_languages_codes_technologies_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('simulation_human_sciences_technologies_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('simulation_natural_sciences_technologies_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('simulation_mathematics_technologies_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('redaction_clarity_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('redaction_spelling_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('redaction_argumentation_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('redaction_structure_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('redaction_cohesion_score', 6, 2)->nullable()->default(0.00);
            $table->decimal('total_points', 6, 2)->nullable()->default(0.00);
            $table->string('status', 16);
            $table->dateTime('registered');
            $table->date('birthday')->nullable();
            $table->dateTime('deleted')->nullable();
            $table->rememberToken(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
