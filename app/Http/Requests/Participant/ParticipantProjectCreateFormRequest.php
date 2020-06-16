<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Participant Project Submit Update Form Request Fields",
 *      description="Participant Project Submit Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantProjectCreateFormRequest extends FormRequest
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
