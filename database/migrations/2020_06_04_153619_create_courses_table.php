<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('banner')->nullable();
            $table->text('intro_link')->nullable();
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('highlight_links')->nullable();
            $table->string('testimonial_links')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('type')->nullable();
            $table->integer('duration')->nullable();
            $table->double('price')->nullable();
            $table->double('availablilty')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
