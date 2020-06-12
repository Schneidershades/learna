<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Models\MultipleChoice;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Instructor\MultipleChoiceCreateFormRequest;
use App\Http\Requests\Instructor\MultipleChoiceUpdateFormRequest;

class MultipleChoiceController extends ApiController
{
     /**
    * @OA\Post(
    *      path="/api/v1/instructor/instructor-multiple-choice",
    *      operationId="createModule",
    *      tags={"instructor"},
    *      summary="create an instructor's multiple choice ",
    *      description="create an instructor's multiple choice ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ModuleCreateFormRequest")
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
    public function store(MultipleChoiceCreateFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $model = new MultipleChoice;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);

    }


      /**
    * @OA\Put(
    *      path="/api/v1/instructor/instructor-multiple-choice/{id}",
    *      operationId="updateModule",
    *      tags={"instructor"},
    *      summary="update an instructor's multiple choice ",
    *      description="update an instructor's multiple choice ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/MultipleChoiceUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Module ID",
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

    public function update(MultipleChoiceUpdateFormRequest $request, $id)
    {
        $model = MultipleChoice::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showOne($model, 201);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/instructor/instructor-multiple-choice/{id}",
    *      operationId="deleteModule",
    *      tags={"instructor"},
    *      summary="delete an instructor's multiple choice ",
    *      description="delete an instructor's multiple choice ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Module ID",
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
        $model = MultipleChoice::findOrFail($id);
        $model->delete();
        return $this->showMessage('choice deleted');
    }
}
