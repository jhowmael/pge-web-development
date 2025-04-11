<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('type', 16);
            $table->string('method', 16);
            $table->decimal('paid_value', 10, 2);
            $table->decimal('extra_value', 10, 2)->nullable();
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->decimal('total_value', 10, 2);
            $table->json('error')->nullable();
            $table->string('status', 16);
            $table->dateTime('paid');
            $table->dateTime('registered');
            $table->dateTime('approved')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
