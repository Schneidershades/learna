<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer('quizable_id')->nullable();
            $table->string('quizable_type')->nullable();
            $table->string('name')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('timer')->nullable();
            $table->integer('points')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('satisfactory')->default(false);
            $table->boolean('comment')->default(false);
            $table->string('status')->default('open');
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
        Schema::dropIfExists('quizzes');
    }
}
