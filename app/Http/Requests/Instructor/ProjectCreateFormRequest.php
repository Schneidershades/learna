<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Project Create Form Request Fields",
 *      description="Project Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ProjectCreateFormRequest extends FormRequest
{
     /**
     * @OA\Property(
     *      title="model id",
     *      description="model id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $projectable_id;

     /**
     * @OA\Property(
     *      title="model type",
     *      description="model type",
     *      example="course/topic/module"
     * )
     *
     * @var string
     */
    public $projectable_type;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name",
     *      example="Times "
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description",
     *      example="This is a description "
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Deadline",
     *      description="Deadline",
     *      example="2020-06-29 "
     * )
     *
     * @var string
     */
    public $deadline;

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
            'projectable_id' => 'required|int',
            'projectable_type' => 'required|string|max:255|in:Topic,Module,Course',
            'name' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'points' => 'required|int',
        ];
    }
}
