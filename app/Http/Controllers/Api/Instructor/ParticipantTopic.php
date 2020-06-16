<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantTopic extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-topic",
    *      operationId="allInstructorParticipantTopics",
    *      tags={"instructor"},
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
    *      path="/api/v1/instructor/participant-topic",
    *      operationId="createInstructorParticipantTopic",
    *      tags={"instructor"},
    *      summary="create a participant's topic ",
    *      description="create a participant's topic ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantTopicCreateFormRequest")
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
    public function store(InstructorParticipantTopicCreateFormRequest $request)
    {
        $model = new ParticipantTopic;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('topic created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-topic/{id}",
    *      operationId="showInstructorParticipantTopic",
    *      tags={"instructor"},
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
    *      path="/api/v1/instructor/participant-topic/{id}",
    *      operationId="updateInstructorParticipantTopic",
    *      tags={"instructor"},
    *      summary="update a participant's topic ",
    *      description="update a participant's topic ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantTopicUpdateFormRequest")
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
   
    public function update(InstructorParticipantTopicUpdateFormRequest $request, $id)
    {
        $model = ParticipantTopic::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('topic updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/participant-topic/{id}",
    *      operationId="deleteInstructorParticipantTopic",
    *      tags={"instructor"},
    *      summary="delete a participant's topic ",
    *      description="delete a participant's topic ",
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
        $model = ParticipantTopic::findOrFail($id);
        $model->delete();
        return $this->showMessage('topic deleted');
    }
}

