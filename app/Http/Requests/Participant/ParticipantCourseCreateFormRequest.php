<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Participant Course Create Form Request Fields",
 *      description="Participant Course Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantCourseCreateFormRequest extends FormRequest
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
