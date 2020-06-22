<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Participant Quiz Update Form Request Fields",
 *      description="Participant Quiz Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantQuizUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Quiz id",
     *      description="Quiz id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $quiz_id;

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
            'quiz_id' => 'required|int|exists:quizzes,id',
            'status' => 'required|string',
        ];
    }
}
