<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Models\Course;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Instructor\CourseCreateFormRequest;
use App\Http\Requests\Instructor\CourseUpdateFormRequest;

class CourseController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-course",
    *      operationId="allCourses",
    *      tags={"instructor"},
    *      summary="Show all courses of an instructor",
    *      description="Show all courses of an instructor",
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
        return $this->showAll(Course::where('user_id', auth()->user()->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-course",
    *      operationId="createCourse",
    *      tags={"instructor"},
    *      summary="create an instructor's course ",
    *      description="create an instructor's course ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CourseCreateFormRequest")
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
    public function store(CourseCreateFormRequest $request)
    {
        $model = new Course;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('course created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/instructor/instructor-course/{id}",
    *      operationId="showCourse",
    *      tags={"instructor"},
    *      summary="show an instructor's course details ",
    *      description="show an instructor's course details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Course ID",
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
        return $this->showOne(Course::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-course/{id}",
    *      operationId="updateCourse",
    *      tags={"instructor"},
    *      summary="update an instructor's course ",
    *      description="update an instructor's course ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CourseUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Course ID",
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
   
    public function update(CourseUpdateFormRequest $request, $id)
    {
        $model = Course::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('course updated');
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-course/{id}",
    *      operationId="deleteCourse",
    *      tags={"instructor"},
    *      summary="delete an instructor's course ",
    *      description="delete an instructor's course ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Course ID",
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
        $model = Course::findOrFail($id);
        $model->delete();
        return $this->showMessage('course deleted');
    }
}
