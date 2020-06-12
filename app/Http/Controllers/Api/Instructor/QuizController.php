<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Models\Quiz;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Instructor\QuizCreateFormRequest;
use App\Http\Requests\Instructor\QuizUpdateFormRequest;

class QuizController extends ApiController
{
      /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-quiz",
    *      operationId="createQuiz",
    *      tags={"instructor"},
    *      summary="create an instructor's quiz ",
    *      description="create an instructor's quiz ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/QuizCreateFormRequest")
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
    public function store(QuizCreateFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $model = new Quiz;
        
        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-quiz/{id}",
    *      operationId="showQuiz",
    *      tags={"instructor"},
    *      summary="show an instructor's quiz details ",
    *      description="show an instructor's quiz details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Quiz ID",
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
        return $this->showOne(Quiz::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-quiz/{id}",
    *      operationId="updateQuiz",
    *      tags={"instructor"},
    *      summary="update an instructor's quiz ",
    *      description="update an instructor's quiz ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/QuizUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Quiz ID",
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
    public function update(QuizUpdateFormRequest $request, $id)
    {
        $model = Quiz::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-quiz/{id}",
    *      operationId="deleteQuiz",
    *      tags={"instructor"},
    *      summary="delete an instructor's quiz ",
    *      description="delete an instructor's quiz ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Quiz ID",
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
        $model = Quiz::findOrFail($id);
        $model->delete();
        return $this->showMessage('quiz deleted');
    }
}
