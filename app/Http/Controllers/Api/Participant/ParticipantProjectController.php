<?php

namespace App\Http\Controllers\Api\Participant;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\ParticipantProject;

class ParticipantProjectController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-project",
    *      operationId="allParticipantProjects",
    *      tags={"participant"},
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
    *      path="/api/v1/participant/participant-project",
    *      operationId="createParticipantProject",
    *      tags={"participant"},
    *      summary="create a participant's project ",
    *      description="create a participant's project ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantProjectCreateFormRequest")
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
    public function store(ParticipantProjectCreateFormRequest $request)
    {
        $model = new ParticipantProject;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('project created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-project/{id}",
    *      operationId="showParticipantProject",
    *      tags={"participant"},
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
    *      path="/api/v1/participant/participant-project/{id}",
    *      operationId="updateParticipantProject",
    *      tags={"participant"},
    *      summary="update a participant's project ",
    *      description="update a participant's project ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantProjectUpdateFormRequest")
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
   
    public function update(ParticipantProjectUpdateFormRequest $request, $id)
    {
        $model = ParticipantProject::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('project updated');
    }
}
