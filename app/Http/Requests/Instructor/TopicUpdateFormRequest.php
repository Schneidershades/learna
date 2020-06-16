<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Topic Update Form Request Fields",
 *      description="Topic Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class TopicUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="module id",
     *      description="module id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $course_id;

    /**
     * @OA\Property(
     *      title="Topic name",
     *      description="Topic name",
     *      example="This is a topic name"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description",
     *      example="This is a module"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Time in seconds",
     *      description="Time in seconds",
     *      example="40000"
     * )
     *
     * @var string
     */
    public $seconds;

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
            'module_id' => 'required|exists:modules,id',
            'name' => 'required|string',
            'description' => 'required|int',
            'seconds' => 'required|int',
        ];
    }
}
