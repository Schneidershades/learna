<?php

namespace App\Http\Controllers\Api\Participant;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class ParticipantPayment extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-payment",
    *      operationId="allParticipantPayments",
    *      tags={"participant"},
    *      summary="Show all payments of a participant",
    *      description="Show all payments of a participant",
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
        return $this->showAll(Payment::where('user_id', auth()->user()->participant->id)->get());
    }

     /**
    * @OA\Post(
    *      path="/api/v1/participant/participant-payment",
    *      operationId="createParticipantPayment",
    *      tags={"participant"},
    *      summary="create a participant's payment ",
    *      description="create a participant's payment ",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantPaymentCreateFormRequest")
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
    public function store(ParticipantPaymentCreateFormRequest $request)
    {
        $model = new ParticipantPayment;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('payment created');
    }

     /**
    * @OA\Get(
    *      path="/api/v1/participant/participant-payment/{id}",
    *      operationId="showParticipantPayment",
    *      tags={"participant"},
    *      summary="show a participant's payment details ",
    *      description="show a participant's payment details ",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantPayment ID",
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
        return $this->showOne(Payment::findOrFail($id), 201);
    }

      /**
    * @OA\Put(
    *      path="/api/v1/participant/participant-payment/{id}",
    *      operationId="updateParticipantPayment",
    *      tags={"participant"},
    *      summary="update a participant's payment ",
    *      description="update a participant's payment ",
    *      
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ParticipantPaymentUpdateFormRequest")
    *      ),
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ParticipantPayment ID",
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
   
    public function update(ParticipantPaymentUpdateFormRequest $request, $id)
    {
        $model = Payment::findOrFail($id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('payment updated');
    }
}
