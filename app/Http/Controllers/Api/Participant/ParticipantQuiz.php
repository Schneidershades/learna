<?php

namespace App\Http\Controllers\Api\Participant;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\ParticipantQuiz;

class ParticipantQuiz extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-quiz",
    *      operationId="allParticipantQuizs",
    *      tags={"participant"},
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
    *      path="/api/v1/participant/participant-quiz",
    *      operationId="createParticipantQuiz",
    *      tags={"participant"},
    *      summary="create a participant's quiz ",
    *      description="create a participant's quiz ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantQuizCreateFormRequest")
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
    public function store(ParticipantQuizCreateFormRequest $request)
    {
        $model = new ParticipantQuiz;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('quiz created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-quiz/{id}",
    *      operationId="showParticipantQuiz",
    *      tags={"participant"},
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
    *      path="/api/v1/participant/participant-quiz/{id}",
    *      operationId="updateParticipantQuiz",
    *      tags={"participant"},
    *      summary="update a participant's quiz ",
    *      description="update a participant's quiz ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantQuizUpdateFormRequest")
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
   
    public function update(ParticipantQuizUpdateFormRequest $request, $id)
    {
        $model = ParticipantQuiz::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('quiz updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/participant/participant-quiz/{id}",
    *      operationId="deleteParticipantQuiz",
    *      tags={"participant"},
    *      summary="delete a participant's quiz ",
    *      description="delete a participant's quiz ",
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
        $model = ParticipantQuiz::findOrFail($id);
        $model->delete();
        return $this->showMessage('quiz deleted');
    }
}
