<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Participant Payment Create Form Request Fields",
 *      description="Participant Payment Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantPaymentCreateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
