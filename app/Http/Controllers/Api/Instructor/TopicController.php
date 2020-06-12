<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Models\Topic;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Instructor\TopicCreateFormRequest;
use App\Http\Requests\Instructor\TopicUpdateFormRequest;

class TopicController extends ApiController
{
    public function index()
    {
        return auth()->user()->instructor()->courses;
    }

      /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-topic",
    *      operationId="createTopic",
    *      tags={"instructor"},
    *      summary="create an instructor's topic ",
    *      description="create an instructor's topic ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TopicCreateFormRequest")
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
    public function store(TopicCreateFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $model = new Topic;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-topic/{id}",
    *      operationId="showTopic",
    *      tags={"instructor"},
    *      summary="show an instructor's topic details ",
    *      description="show an instructor's topic details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Topic ID",
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
        return $this->showOne(Topic::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-topic/{id}",
    *      operationId="updateTopic",
    *      tags={"instructor"},
    *      summary="update an instructor's topic ",
    *      description="update an instructor's topic ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TopicUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Topic ID",
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
    public function update(TopicUpdateFormRequest $request, $id)
    {
        $model = Topic::findOrFail($id);
        
        $this->requestAndDbIntersection($request, $model, []);

        $model->save();
        
        return $this->showOne($model, 201);
    }

      /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-topic/{id}",
    *      operationId="deleteTopic",
    *      tags={"instructor"},
    *      summary="delete an instructor's topic ",
    *      description="delete an instructor's topic ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Topic ID",
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
        $model = Topic::findOrFail($id);
        $model->delete();
        return $this->showMessage('topic deleted');
    }
}