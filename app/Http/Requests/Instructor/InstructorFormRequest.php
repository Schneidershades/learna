<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Intructor Create Form Request Fields",
 *      description="Intructor Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class InstructorFormRequest extends FormRequest
{
     /**
     * @OA\Property(
     *      title="Instructor profession",
     *      description="Instructor profession",
     *      example="Carpenter"
     * )
     *
     * @var string
     */
    public $profession;

    /**
     * @OA\Property(
     *      title="Official Email",
     *      description="official_email",
     *      example="admin@admin.com"
     * )
     *
     * @var string
     */
    public $official_email;

    /**
     * @OA\Property(
     *      title="Instagram Link",
     *      description="Instagram Link",
     *      example="https://"
     * )
     *
     * @var string
     */
    public $instagram;


    /**
     * @OA\Property(
     *      title="Twitter Link",
     *      description="Twitter Link",
     *      example="https://"
     * )
     *
     * @var string
     */
    public $twitter;

    /**
     * @OA\Property(
     *      title="Facebook Link",
     *      description="Facebook Link",
     *      example="https://"
     * )
     *
     * @var string
     */
    public $facebook;


    /**
     * @OA\Property(
     *      title="Linkedin Link",
     *      description="Linkedin Link",
     *      example="Https://"
     * )
     *
     * @var string
     */
    public $linkedin;

    /**
     * @OA\Property(
     *      title="Website Link",
     *      description="Website Link",
     *      example="Https://"
     * )
     *
     * @var string
     */
    public $website;

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
            'profession' => 'required|string|max:255',
            'official_email' => 'string|max:255',
            'instagram' => 'string|max:255',
            'twitter' => 'string|max:255',
            'facebook' => 'string|max:255',
            'linkedin' => 'string|max:255',
            'website' => 'string|max:255',
        ];
    }
}