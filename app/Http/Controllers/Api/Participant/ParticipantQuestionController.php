<?php

namespace App\Http\Controllers\Api\Participant;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\ParticipantQuestion;

class ParticipantQuestionController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-question",
    *      operationId="allParticipantQuestions",
    *      tags={"participant"},
    *      summary="Show all question of a participant",
    *      description="Show all question of a participant",
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
        return $this->showAll(ParticipantQuestion::where('user_id', auth()->user()->participant->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/participant/participant-question",
    *      operationId="createParticipantQuestion",
    *      tags={"participant"},
    *      summary="create a participant's question ",
    *      description="create a participant's question ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantQuestionCreateFormRequest")
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
    public function store(ParticipantQuestionCreateFormRequest $request)
    {
        $model = new ParticipantQuestion;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('question created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-question/{id}",
    *      operationId="showParticipantQuestion",
    *      tags={"participant"},
    *      summary="show a participant's question details ",
    *      description="show a participant's question details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantQuestion ID",
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
        return $this->showOne(ParticipantQuestion::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/participant/participant-question/{id}",
    *      operationId="updateParticipantQuestion",
    *      tags={"participant"},
    *      summary="update a participant's question ",
    *      description="update a participant's question ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantQuestionUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantQuestion ID",
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
   
    public function update(ParticipantQuestionUpdateFormRequest $request, $id)
    {
        $model = ParticipantQuestion::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('question updated');
    }
}
