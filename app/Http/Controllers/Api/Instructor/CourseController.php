<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return auth()->user()->instructor()->courses;
    }

    public function store(Request $request)
    {
        $requestColumns = array_keys($request->all());

        $course = new Course;

        $tableColumns = $this->getColumns($course->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $course->setAttribute($field, $request[$field]);
        }

        return $course;
    }

    public function show($id)
    {
        return Course::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $requestColumns = array_keys($request->all());
        
        $tableColumns = $this->getColumns($table->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $course->setAttribute($field, $request[$field]);
        }

        return $course;
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
    }
}
