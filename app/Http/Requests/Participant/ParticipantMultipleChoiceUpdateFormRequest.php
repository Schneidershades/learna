<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Participant Multiple Choice Update Form Request Fields",
 *      description="Participant Multiple Choice Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantMultipleChoiceUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Multiple Choice id",
     *      description="Multiple Choice id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $multiple_choice_id;

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
            'multiple_choice_id' => 'required|int|exists:multiple_choices,id',
            'status' => 'required|string',
        ];
    }
}
