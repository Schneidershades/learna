<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Participant Project Submit Update Form Request Fields",
 *      description="Participant Project Submit Update request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class ParticipantProjectCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Project id",
     *      description="Project id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $project_id;

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Status",
     *      example="Opened/Closed"
     * )
     *
     * @var string
     */
    public $staus;

    /**
     * @OA\Property(
     *      title="Project Link",
     *      description="Project Link",
     *      example="https://"
     * )
     *
     * @var string
     */
    public $link;

    /**
     * @OA\Property(
     *      title="Project Upload",
     *      description="Project Upload",
     *      example="https://"
     * )
     *
     * @var string
     */
    public $project_upload;

    /**
     * @OA\Property(
     *      title="text",
     *      description="text",
     *      example="essay description"
     * )
     *
     * @var string
     */
    public $text;

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
            'project_id' => 'required|int|exists:projects,id',
            'status' => 'required|string',
            'link' => 'required|string',
            'project_upload' => 'file',
            'text' => 'string',
        ];
    }
}
