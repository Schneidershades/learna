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
     * @OA\Property(
     *      title="model id",
     *      description="model id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $materable_id;

     /**
     * @OA\Property(
     *      title="model type",
     *      description="model type",
     *      example="course/topic/module"
     * )
     *
     * @var string
     */
    public $materable_type;

    /**
     * @OA\Property(
     *      title="Link if any",
     *      description="Link if any",
     *      example="https:// "
     * )
     *
     * @var string
     */
    public $link;

    /**
     * @OA\Property(
     *      title="Upload File",
     *      description="Upload File",
     *      example="This is a description "
     * )
     *
     * @var string
     */
    public $upload;

    
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
            'materable_id' => 'required|int',
            'materable_type' => 'required|string|max:255|in:Topic,Module,Course',
            'link' => 'required|string',
            'upload' => 'file',
        ];
    }
}
