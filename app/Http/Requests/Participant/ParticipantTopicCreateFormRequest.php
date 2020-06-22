<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Participant Topic Update Form Request Fields",
 *      description="Participant Topic Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantTopicCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Topic id",
     *      description="Topic id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $project_id;

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
            'topic_id' => 'required|int|exists:topics,id',
            'status' => 'required|string',
        ];
    }
}
