<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Topic Material Update Form Request Fields",
 *      description="Topic Material Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class TopicMaterialUpdateFormRequest extends FormRequest
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
            'link' => 'required|string',
            'upload' => 'file',
        ];
    }
}
