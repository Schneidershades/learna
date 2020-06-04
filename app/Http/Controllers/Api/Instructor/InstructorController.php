<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Http\Requests\Instructor\InstructorFormRequest;

class InstructorController extends Controller
{
    public function update(InstructorFormRequest $request, $id)
    {
        $instructor = Instructor::where('user_id', $id)->first();

        $requestColumns = array_keys($request->all());
        
        $tableColumns = $this->getColumns($instructor->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $instructor->setAttribute($field, $request[$field]);
        }

        $instructor->save();

        return $instructor;
    }
}
