<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $requestColumns = array_keys($request->all());

        $project = new Project;

        $tableColumns = $this->getColumns($project->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $project->setAttribute($field, $request[$field]);
        }

        $project->save();

        return $project;
    }

    public function show($id)
    {
        return Project::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $requestColumns = array_keys($request->all());
        
        $tableColumns = $this->getColumns($table->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $project->setAttribute($field, $request[$field]);
        }

        $project->save();

        return $project;
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
    }
}
