<?php

namespace App\Http\Controllers\Api\Participant;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\ParticipantTopic;

class ParticipantTopicController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-topic",
    *      operationId="allParticipantTopics",
    *      tags={"participant"},
    *      summary="Show all topics of a participant",
    *      description="Show all topics of a participant",
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
        return $this->showAll(ParticipantTopic::where('user_id', auth()->user()->participant->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/participant/participant-topic",
    *      operationId="createParticipantTopic",
    *      tags={"participant"},
    *      summary="create a participant's topic ",
    *      description="create a participant's topic ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantTopicCreateFormRequest")
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
    public function store(ParticipantTopicCreateFormRequest $request)
    {
        $model = new ParticipantTopic;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('topic created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-topic/{id}",
    *      operationId="showParticipantTopic",
    *      tags={"participant"},
    *      summary="show a participant's topic details ",
    *      description="show a participant's topic details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantTopic ID",
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
        return $this->showOne(ParticipantTopic::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/participant/participant-topic/{id}",
    *      operationId="updateParticipantTopic",
    *      tags={"participant"},
    *      summary="update a participant's topic ",
    *      description="update a participant's topic ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantTopicUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantTopic ID",
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
   
    public function update(ParticipantTopicUpdateFormRequest $request, $id)
    {
        $model = ParticipantTopic::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('topic updated');
    }
}
