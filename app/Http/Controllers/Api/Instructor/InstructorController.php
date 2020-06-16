<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Api\ApiController;
use App\Models\Instructor;
use App\Http\Requests\Instructor\InstructorFormRequest;

class InstructorController extends ApiController
{
	  /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-profile/{id}",
    *      operationId="updateProfile",
    *      tags={"instructor"},
    *      summary="update an instructor's profile ",
    *      description="update an instructor's profile ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InstructorFormRequest")
    *      ),
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
   
    public function update(InstructorFormRequest $request, $id)
    {
        $model = Instructor::where('user_id', $id)->first();

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }
}
