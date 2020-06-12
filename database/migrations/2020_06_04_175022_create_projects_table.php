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
            $table->foreignId('projectable_id')->constrained()->onDelete('cascade');
            $table->string('projectable_type')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->date('deadline')->nullable();
            $table->text('points')->nullable();
            $table->text('link')->nullable();
            $table->text('upload')->nullable();
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
