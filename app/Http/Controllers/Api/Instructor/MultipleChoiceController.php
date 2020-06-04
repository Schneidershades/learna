<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultipleChoiceController extends Controller
{
    public function store(Request $request)
    {
        $requestColumns = array_keys($request->all());

        $course = new MultipleChoice;

        $tableColumns = $this->getColumns($course->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $course->setAttribute($field, $request[$field]);
        }

        return $course;
    }

    public function update(Request $request, $id)
    {
        $course = MultipleChoice::findOrFail($id);

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
        $course = MultipleChoice::findOrFail($id);
        $course->delete();
    }
}
