<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        return auth()->user()->instructor()->courses;
    }

    public function store(Request $request)
    {
        $requestColumns = array_keys($request->all());

        $topic = new Topic;

        $tableColumns = $this->getColumns($topic->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $topic->setAttribute($field, $request[$field]);
        }

        $topic->save();

        return $topic;
    }

    public function show($id)
    {
        return Topic::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);

        $requestColumns = array_keys($request->all());
        
        $tableColumns = $this->getColumns($table->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $topic->setAttribute($field, $request[$field]);
        }

        $topic->save();
        
        return $topic;
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
    }
}