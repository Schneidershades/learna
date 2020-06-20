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

class ParticipantTopicUpdateFormRequest extends FormRequest
{
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
            //
        ];
    }
}