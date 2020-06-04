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
            $table->string('course_name')->nullable();
            $table->text('course_banner')->nullable();
            $table->text('course_intro_link')->nullable();
            $table->string('course_short_description')->nullable();
            $table->string('course_long_description')->nullable();
            $table->string('course_hightlight_links')->nullable();
            $table->string('course_testimonial_links')->nullable();
            $table->date('course_start_date')->nullable();
            $table->date('course_end_date')->nullable();
            $table->date('course_type')->nullable();
            $table->string('course_duration')->nullable();
            $table->double('course_price')->nullable();
            $table->double('course_availablilty')->nullable();
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
