<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Quiz Create Form Request Fields",
 *      description="Quiz Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class QuizCreateFormRequest extends FormRequest
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
    public $quizable_id;

     /**
     * @OA\Property(
     *      title="model type",
     *      description="model type",
     *      example="course/topic/module"
     * )
     *
     * @var string
     */
    public $quizable_type;

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
     *      title="Duration of the question on the app",
     *      description="Duration of the question on the app",
     *      example="1000 "
     * )
     *
     * @var string
     */
    public $duration;

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
            'quizable_id' => 'required|int',
            'quizable_type' => 'required|string',
            'name' => 'required|string',
            'duration' => 'required|int',
            'points' => 'required|int',
        ];
    }
}
