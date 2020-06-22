<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

class ParticipantProject extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-project",
    *      operationId="allInstructorParticipantParticipantProjects",
    *      tags={"instructor"},
    *      summary="Show all project of a participant",
    *      description="Show all project of a participant",
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
        return $this->showAll(ParticipantProject::where('user_id', auth()->user()->participant->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/instructor/participant-project",
    *      operationId="createInstructorParticipantProject",
    *      tags={"instructor"},
    *      summary="create a participant's project ",
    *      description="create a participant's project ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantProjectCreateFormRequest")
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
    public function store(InstructorParticipantProjectCreateFormRequest $request)
    {
        $model = new ParticipantProject;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('project created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-project/{id}",
    *      operationId="showInstructorParticipantProject",
    *      tags={"instructor"},
    *      summary="show a participant's project details ",
    *      description="show a participant's project details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantProject ID",
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
        return $this->showOne(ParticipantProject::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/participant-project/{id}",
    *      operationId="updateInstructorParticipantProject",
    *      tags={"instructor"},
    *      summary="update a participant's project ",
    *      description="update a participant's project ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantProjectUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantProject ID",
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
   
    public function update(InstructorParticipantProjectUpdateFormRequest $request, $id)
    {
        $model = ParticipantProject::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('project updated');
    }
}
