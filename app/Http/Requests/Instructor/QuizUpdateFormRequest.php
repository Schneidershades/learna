<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Quiz Update Form Request Fields",
 *      description="Quiz Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class QuizUpdateFormRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'topic_id' => 'required|exists:topics,id',
            'name' => 'required|string',
            'duration' => 'required|int',
            'points' => 'required|int',
        ];
    }
}
