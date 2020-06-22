<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

class ParticipantQuiz extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-quiz",
    *      operationId="allInstructorParticipantQuizs",
    *      tags={"instructor"},
    *      summary="Show all quiz of a participant",
    *      description="Show all quiz of a participant",
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
   
    public function index()
    {
        return $this->showAll(ParticipantQuiz::where('user_id', auth()->user()->participant->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/instructor/participant-quiz",
    *      operationId="createInstructorParticipantQuiz",
    *      tags={"instructor"},
    *      summary="create a participant's quiz ",
    *      description="create a participant's quiz ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantQuizCreateFormRequest")
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
    public function store(InstructorParticipantQuizCreateFormRequest $request)
    {
        $model = new ParticipantQuiz;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('quiz created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-quiz/{id}",
    *      operationId="showInstructorParticipantQuiz",
    *      tags={"instructor"},
    *      summary="show a participant's quiz details ",
    *      description="show a participant's quiz details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantQuiz ID",
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
        return $this->showOne(ParticipantQuiz::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/participant-quiz/{id}",
    *      operationId="updateInstructorParticipantQuiz",
    *      tags={"instructor"},
    *      summary="update a participant's quiz ",
    *      description="update a participant's quiz ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantQuizUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantQuiz ID",
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
   
    public function update(InstructorParticipantQuizUpdateFormRequest $request, $id)
    {
        $model = ParticipantQuiz::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('quiz updated');
    }
}
