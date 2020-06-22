<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Participant Question Update Form Request Fields",
 *      description="Participant Question Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantQuestionCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Question id",
     *      description="Question id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $question_id;

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Status",
     *      example="Opened/Closed"
     * )
     *
     * @var string
     */
    public $staus;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_id' => 'required|int|exists:questions,id',
            'status' => 'required|string',
        ];
    }
}
