<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Question Update Form Request Fields",
 *      description="Question Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class QuestionUpdateFormRequest extends FormRequest
{
     /**
     * @OA\Property(
     *      title="quiz id",
     *      description="quiz id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $quiz_id;

     /**
     * @OA\Property(
     *      title="Question please",
     *      description="Question please",
     *      example="What is ???"
     * )
     *
     * @var string
     */
    public $question;

    /**
     * @OA\Property(
     *      title="is the question an essay?",
     *      description="is the question an essay?",
     *      example="true/false"
     * )
     *
     * @var string
     */
    public $essay;

    /**
     * @OA\Property(
     *      title="Answe of the essay",
     *      description="Answe of the essay",
     *      example="this is an answer "
     * )
     *
     * @var string
     */
    public $answer;

    /**
     * @OA\Property(
     *      title="Points if answered",
     *      description="Points if answered",
     *      example="10"
     * )
     *
     * @var int
     */
    public $points;

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
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required|string',
            'essay' => 'required|boolean',
            'answer' => 'required|string',
            'points' => 'required|int',
        ];
    }
}
