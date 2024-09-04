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
            $table->float('portuguese_score')->default(0);
            $table->float('mathematics_score')->default(0);
            $table->float('logic_reasoning_score')->default(0);
            $table->float('informatics_score')->default(0);
            $table->float('specific_knowledge_score')->default(0);
            $table->float('legislation_score')->default(0);
            $table->float('general_knowledge_score')->default(0);
            $table->float('law_score')->default(0);
            $table->float('administration_score')->default(0);
            $table->float('economics_score')->default(0);
            $table->float('health_score')->default(0);
            $table->float('education_score')->default(0);
            $table->float('engineering_score')->default(0);
            $table->float('accounting_score')->default(0);
            $table->float('architecture_score')->default(0);
            $table->float('science_score')->default(0);
            $table->float('information_technology_score')->default(0);
            $table->float('social_work_score')->default(0);
            $table->float('redaction_score')->default(0);
            $table->float('total_score')->default(0);
            $table->integer('total_points')->default(0);
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
