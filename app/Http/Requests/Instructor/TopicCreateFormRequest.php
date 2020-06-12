<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Topic Create Form Request Fields",
 *      description="Topic Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class TopicCreateFormRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'child_topic' => 'required|boolean',
            'parent_topic_id' => 'int|exists:topics,id',
            'name' => 'required|string',
            'description' => 'required|int',
            'seconds' => 'required|int',
        ];
    }
}
