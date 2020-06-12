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