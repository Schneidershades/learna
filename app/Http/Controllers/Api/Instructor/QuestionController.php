<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Models\Question;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Instructor\QuestionCreateFormRequest;
use App\Http\Requests\Instructor\QuestionUpdateFormRequest;

class QuestionController extends ApiController
{
     /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-question",
    *      operationId="createQuestion",
    *      tags={"instructor"},
    *      summary="create an instructor's question ",
    *      description="create an instructor's question ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/QuestionCreateFormRequest")
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
    public function store(QuestionCreateFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $model = new Question;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-question/{id}",
    *      operationId="showQuestion",
    *      tags={"instructor"},
    *      summary="show an instructor's question details ",
    *      description="show an instructor's question details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Question ID",
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
        return $this->showOne(Question::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-question/{id}",
    *      operationId="updateQuestion",
    *      tags={"instructor"},
    *      summary="update an instructor's question ",
    *      description="update an instructor's question ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/QuestionUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Question ID",
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

    public function update(QuestionUpdateFormRequest $request, $id)
    {
        $model = Question::findOrFail($id);
        
        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }
     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-question/{id}",
    *      operationId="deleteQuestion",
    *      tags={"instructor"},
    *      summary="delete an instructor's question ",
    *      description="delete an instructor's question ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Question ID",
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
        $model = Question::findOrFail($id);
        $model->delete();
        return $this->showMessage('question deleted');
    }
}
