<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Multiple Choice Update Form Request Fields",
 *      description="Multiple Choice Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class MultipleChoiceUpdateFormRequest extends FormRequest
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
            'question_id' => 'required|exists:questions,id',
            'option' => 'required|strint',
            'correct_answer' => 'required|boolean',
        ];
    }
}
