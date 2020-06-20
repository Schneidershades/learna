<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Api\ApiController;
use App\Models\Category;

class CategoryController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/general/categories",
    *      operationId="allCategories",
    *      tags={"general"},
    *      summary="Show all  categories",
    *      description="Show all  categories",
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
        return $this->showAll(Category::all());
    }
}
