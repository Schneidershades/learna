<?php

namespace App\Http\Controllers\Api\Participant;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\ParticipantCourse;

class ParticipantCourse extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-course",
    *      operationId="allParticipantCourses",
    *      tags={"participant"},
    *      summary="Show all courses of a participant",
    *      description="Show all courses of a participant",
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
        return $this->showAll(ParticipantCourse::where('user_id', auth()->user()->participant->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/participant/participant-course",
    *      operationId="createParticipantCourse",
    *      tags={"participant"},
    *      summary="create a participant's course ",
    *      description="create a participant's course ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantCourseCreateFormRequest")
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
    public function store(ParticipantCourseCreateFormRequest $request)
    {
        $model = new ParticipantCourse;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('course created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-course/{id}",
    *      operationId="showParticipantCourse",
    *      tags={"participant"},
    *      summary="show a participant's course details ",
    *      description="show a participant's course details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantCourse ID",
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
        return $this->showOne(ParticipantCourse::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/participant/participant-course/{id}",
    *      operationId="updateParticipantCourse",
    *      tags={"participant"},
    *      summary="update a participant's course ",
    *      description="update a participant's course ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantCourseUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantCourse ID",
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
   
    public function update(ParticipantCourseUpdateFormRequest $request, $id)
    {
        $model = ParticipantCourse::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('course updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/participant/participant-course/{id}",
    *      operationId="deleteParticipantCourse",
    *      tags={"participant"},
    *      summary="delete a participant's course ",
    *      description="delete a participant's course ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantCourse ID",
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
        $model = ParticipantCourse::findOrFail($id);
        $model->delete();
        return $this->showMessage('course deleted');
    }
}
