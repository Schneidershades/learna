<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Question Create Form Request Fields",
 *      description="Question Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class QuestionCreateFormRequest extends FormRequest
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
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required|string',
            'essay' => 'required|boolean',
            'answer' => 'required|string',
            'points' => 'required|int',
        ];
    }
}
