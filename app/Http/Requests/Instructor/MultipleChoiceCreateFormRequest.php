<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Multiple Choice Create Form Request Fields",
 *      description="Multiple Choice Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class MultipleChoiceCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="question id",
     *      description="question id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $question_id;

    /**
     * @OA\Property(
     *      title="Option",
     *      description="Option",
     *      example="Wole Soyinka"
     * )
     *
     * @var string
     */
    public $option;

    /**
     * @OA\Property(
     *      title="Correct Answer",
     *      description="Correct Answer",
     *      example="true/false"
     * )
     *
     * @var string
     */
    public $correct_answer;

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
