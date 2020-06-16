<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantMultipleChoice extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-multiple-choice",
    *      operationId="allInstructorParticipantMultipleChoices",
    *      tags={"instructor"},
    *      summary="Show all multiple choice of a participant",
    *      description="Show all multiple choice of a participant",
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
        return $this->showAll(ParticipantMultipleChoice::where('user_id', auth()->user()->participant->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/instructor/participant-multiple-choice",
    *      operationId="createInstructorParticipantMultipleChoice",
    *      tags={"instructor"},
    *      summary="create a participant's multiple choice ",
    *      description="create a participant's multiple choice ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantMultipleChoiceCreateFormRequest")
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
    public function store(InstructorParticipantMultipleChoiceCreateFormRequest $request)
    {
        $model = new ParticipantMultipleChoice;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('multiple choice created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-multiple-choice/{id}",
    *      operationId="showInstructorParticipantMultipleChoice",
    *      tags={"instructor"},
    *      summary="show a participant's multiple choice details ",
    *      description="show a participant's multiple choice details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantMultipleChoice ID",
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
        return $this->showOne(InstructorParticipantMultipleChoice::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/participant-multiple-choice/{id}",
    *      operationId="updateInstructorParticipantMultipleChoice",
    *      tags={"instructor"},
    *      summary="update a participant's multiple choice ",
    *      description="update a participant's multiple choice ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantMultipleChoiceUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantMultipleChoice ID",
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
   
    public function update(ParticipantMultipleChoiceUpdateFormRequest $request, $id)
    {
        $model = ParticipantMultipleChoice::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('multiple choice updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/participant-multiple-choice/{id}",
    *      operationId="deleteInstructorParticipantMultipleChoice",
    *      tags={"instructor"},
    *      summary="delete a participant's multiple choice ",
    *      description="delete a participant's multiple choice ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantMultipleChoice ID",
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
        $model = ParticipantMultipleChoice::findOrFail($id);
        $model->delete();
        return $this->showMessage('multiple choice deleted');
    }
}
