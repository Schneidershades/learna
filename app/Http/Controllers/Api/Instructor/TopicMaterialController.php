<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class MaterialMaterialController extends Controller
{
    public function store(Request $request)
    {
        $requestColumns = array_keys($request->all());

        $material = new Material;

        $tableColumns = $this->getColumns($material->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $material->setAttribute($field, $request[$field]);
        }

        $material->save();

        return $material;
    }

    public function show($id)
    {
        return Material::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $requestColumns = array_keys($request->all());
        
        $tableColumns = $this->getColumns($table->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $material->setAttribute($field, $request[$field]);
        }

        $material->save();
        
        return $material;
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
    }
}
