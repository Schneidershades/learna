<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Course Create Form Request Fields",
 *      description="Course Create request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class CourseCreateFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'banner' => 'file',
            'intro_link' => 'required|string|max:255',
            'short_description' => 'string|max:255',
            'long_description' => 'string|max:255',
            'highlight_links' => 'string|max:255',
            'testimonial_links' => 'string|max:255',
            'start_date' => 'string|max:255',
            'end_date' => 'string|max:255',
            'type' => 'string|max:255',
            'duration' => 'int',
            'free' => 'boolean',
            'price' => 'int',
            'availablilty' => 'string|max:255',
        ];
    }
}
