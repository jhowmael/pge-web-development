<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->foreignId('simulation_id')->constrained('simulations')->onDelete('cascade');
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
            $table->foreignId('simulation_id')->constrained('simulations')->onDelete('cascade');
        });


        Schema::table('redactions', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('simulation_id')->constrained('simulations')->onDelete('cascade');
            $table->foreignId('user_simulation_id')->constrained('user_simulations')->onDelete('cascade');
        });

        Schema::table('user_simulations', function (Blueprint $table) {
            $table->foreignId('redaction_id')->constrained('redactions')->onDelete('cascade');
        });

        Schema::table('user_question_responses', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_simulation_id')->constrained('user_simulations')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['simulation_id']);
            $table->dropColumn('simulation_id');
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            
            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');

            $table->dropForeign(['simulation_id']);
            $table->dropColumn('simulation_id');
        });

        Schema::table('redactions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            
            $table->dropForeign(['simulation_id']);
            $table->dropColumn('simulation_id');
            
            $table->dropForeign(['user_simulation_id']);
            $table->dropColumn('user_simulation_id');
        });

        Schema::table('user_simulations', function (Blueprint $table) {
            $table->dropForeign(['redaction_id']);
            $table->dropColumn('redaction_id');
        });

        Schema::table('user_question_responses', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropForeign(['user_simulation_id']);
            $table->dropColumn('user_simulation_id');

            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');
        });
    }
};
