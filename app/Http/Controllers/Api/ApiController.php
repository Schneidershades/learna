<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\Api\ApiResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ApiController extends Controller
{
    use ApiResponder;

    public function getColumns($table)
    {       
        $columns = Schema::getColumnListing($table);
        return $columns;
    }

    public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = []){
          $requestColumns = array_keys($request->all());

          $model = $model;

          $tableColumns = $this->getColumns($model->getTable());

          $fields = array_intersect($requestColumns, $tableColumns);

          foreach($fields as $field){
               $model->setAttribute($field, $request[$field]);
          }

          return $model;
     }

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Learna App OpenApi API Documentation",
     *      description="Learna App Using L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="schneidershades@gmail.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     *
     * @OA\Tag(
     *     name="Learna Application",
     *     description="API Endpoints of Projects"
     * )
     *
     *  @OA\SecurityScheme(
     *     securityScheme="bearerAuth",
     *     type="http",
     *     scheme="bearer"
     * )
     *
     */
}
