<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Models\Material;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Instructor\TopicMaterialCreateFormRequest;
use App\Http\Requests\Instructor\TopicMaterialUpdateFormRequest;

class TopicMaterialController extends ApiController
{
      /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-material",
    *      operationId="createMaterial",
    *      tags={"instructor"},
    *      summary="create an instructor's material ",
    *      description="create an instructor's material ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TopicMaterialCreateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function store(MaterialMaterialCreateFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $model = new Material;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }
    /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-material/{id}",
    *      operationId="showMaterial",
    *      tags={"instructor"},
    *      summary="show an instructor's material details ",
    *      description="show an instructor's material details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Material ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function show($id)
    {
        return $this->showOne(Material::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-material/{id}",
    *      operationId="updateMaterial",
    *      tags={"instructor"},
    *      summary="update an instructor's material ",
    *      description="update an instructor's material ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TopicMaterialUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Material ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function update(MaterialMaterialUpdateFormRequest $request, $id)
    {
        $model = Material::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();
        
        return $this->showOne($model, 201);
    }

      /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-material/{id}",
    *      operationId="deleteMaterial",
    *      tags={"instructor"},
    *      summary="delete an instructor's material ",
    *      description="delete an instructor's material ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Material ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function destroy($id)
    {
        $model = Material::findOrFail($id);
        $model->delete();
        return $this->showMessage('material deleted');
    }
}
