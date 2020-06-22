<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

class ParticipantCourse extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-course",
    *      operationId="allInstructorParticipantCourses",
    *      tags={"instructor"},
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
    *      path="/api/v1/instructor/participant-course",
    *      operationId="createInstructorParticipantCourse",
    *      tags={"instructor"},
    *      summary="create a participant's course ",
    *      description="create a participant's course ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantCourseCreateFormRequest")
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
    public function store(InstructorParticipantCourseCreateFormRequest $request)
    {
        $model = new ParticipantCourse;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('course created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/instructor/participant-course/{id}",
    *      operationId="showInstructorParticipantCourse",
    *      tags={"instructor"},
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
    *      path="/api/v1/instructor/participant-course/{id}",
    *      operationId="updateInstructorParticipantCourse",
    *      tags={"instructor"},
    *      summary="update a participant's course ",
    *      description="update a participant's course ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorParticipantCourseUpdateFormRequest")
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
   
    public function update(InstructorParticipantCourseUpdateFormRequest $request, $id)
    {
        $model = ParticipantCourse::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('course updated');
    }
}

