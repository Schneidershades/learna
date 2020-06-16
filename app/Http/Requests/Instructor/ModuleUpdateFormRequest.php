<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Module Update Form Request Fields",
 *      description="Module Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class ModuleUpdateFormRequest extends FormRequest
{

    /**
     * @OA\Property(
     *      title="course id",
     *      description="course id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $course_id;

    /**
     * @OA\Property(
     *      title="Module name",
     *      description="Module name",
     *      example="Module name"
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
            'course_id' => 'required|int|exists:courses,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
}
