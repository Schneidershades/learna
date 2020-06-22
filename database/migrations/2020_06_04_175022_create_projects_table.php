<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('projectable_id')->nullable();
            $table->string('projectable_type')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('timer')->nullable();
            $table->text('points')->nullable();
            $table->text('link')->nullable();
            $table->text('upload')->nullable();
            $table->boolean('submitted')->default(false);
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
        Schema::dropIfExists('projects');
    }
}
