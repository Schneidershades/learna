<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Api\ApiController;
use App\Models\Module;
use App\Http\Requests\Instructor\ModuleCreateFormRequest;
use App\Http\Requests\Instructor\ModuleUpdateFormRequest;

class ModuleController extends ApiController
{
     /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-module",
    *      operationId="createModule",
    *      tags={"instructor"},
    *      summary="create an instructor's module ",
    *      description="create an instructor's module ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ModuleCreateFormRequest")
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
    public function store(ModuleCreateFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $model = new Module;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }

     /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-module/{id}",
    *      operationId="showModule",
    *      tags={"instructor"},
    *      summary="show an instructor's module details ",
    *      description="show an instructor's module details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Module ID",
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
        return $this->showOne(Module::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-module/{id}",
    *      operationId="updateModule",
    *      tags={"instructor"},
    *      summary="update an instructor's module ",
    *      description="update an instructor's module ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ModuleUpdateFormRequest")
    *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Module ID",
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
    public function update(ModuleUpdateFormRequest $request, $id)
    {
        $model = Module::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);
        
        $model->save();

        return $this->showOne($model, 201);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-module/{id}",
    *      operationId="deleteModule",
    *      tags={"instructor"},
    *      summary="delete an instructor's module ",
    *      description="delete an instructor's module ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Module ID",
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
        $model = Module::findOrFail($id);
        $model->delete();
        return $this->showMessage('module deleted');
    }
}
