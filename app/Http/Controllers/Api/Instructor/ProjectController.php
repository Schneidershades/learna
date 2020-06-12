<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Models\Project;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Instructor\ProjectCreateFormRequest;
use App\Http\Requests\Instructor\ProjectUpdateFormRequest;

class ProjectController extends ApiController
{
     /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-project",
    *      operationId="createProject",
    *      tags={"instructor"},
    *      summary="create an instructor's project ",
    *      description="create an instructor's project ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ProjectCreateFormRequest")
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
    public function store(ProjectCreateFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $model = new Project;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }


     /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-project/{id}",
    *      operationId="showProject",
    *      tags={"instructor"},
    *      summary="show an instructor's project details ",
    *      description="show an instructor's project details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Project ID",
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
        return $this->showOne(Project::findOrFail($id), 201);
    }


      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-project/{id}",
    *      operationId="updateProject",
    *      tags={"instructor"},
    *      summary="update an instructor's project ",
    *      description="update an instructor's project ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ProjectUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Project ID",
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
    public function update(ProjectUpdateFormRequest $request, $id)
    {
        $model = Project::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-project/{id}",
    *      operationId="deleteProject",
    *      tags={"instructor"},
    *      summary="delete an instructor's project ",
    *      description="delete an instructor's project ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Project ID",
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
        $model = Project::findOrFail($id);
        $model->delete();
        return $this->showMessage('project deleted');
    }
}
