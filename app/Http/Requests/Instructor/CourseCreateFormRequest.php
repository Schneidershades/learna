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
     * @OA\Property(
     *      title="Course name",
     *      description="Course name",
     *      example="Course name"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Banner",
     *      description="File Banner",
     *      example="C:/"
     * )
     *
     * @var string
     */
    public $banner;

    /**
     * @OA\Property(
     *      title="Introduction Video Link",
     *      description="Introduction Video Link",
     *      example="https://"
     * )
     *
     * @var string
     */
    public $intro_link;


    /**
     * @OA\Property(
     *      title="Short Description",
     *      description="Short Description",
     *      example="This is a video content"
     * )
     *
     * @var string
     */
    public $short_description;

    /**
     * @OA\Property(
     *      title="Long Description",
     *      description="Long Description",
     *      example="This is a video content"
     * )
     *
     * @var string
     */
    public $long_description;


    /**
     * @OA\Property(
     *      title="Highlight Link",
     *      description="Highlight Link",
     *      example="Https://"
     * )
     *
     * @var string
     */
    public $highlight_links;

    /**
     * @OA\Property(
     *      title="Testimonial Link",
     *      description="Testimonial Link",
     *      example="Https://"
     * )
     *
     * @var string
     */
    public $testimonial_links;

    /**
     * @OA\Property(
     *      title="Start Date",
     *      description="start date on the course",
     *      example="2020-12-04"
     * )
     *
     * @var string
     */
    public $start_date;

    /**
     * @OA\Property(
     *      title="End Date",
     *      description="end date on the course",
     *      example="2020-12-23"
     * )
     *
     * @var string
     */
    public $end_date;

    /**
     * @OA\Property(
     *      title="Course Type ",
     *      description="Course Type",
     *      example="Course Type"
     * )
     *
     * @var string
     */
    public $type;


    /**
     * @OA\Property(
     *      title="Time Duration of the Course",
     *      description="Time Duration of the Course",
     *      example="3000"
     * )
     *
     * @var int
     */
    public $duration;

    /**
     * @var int
     * @OA\Property()
     */
    public $free;

    /**
     * @var int
     * @OA\Property()
     */
    public $price;


    /**
     * @OA\Property(
     *      title="Course Available",
     *      description="Course Available",
     *      example="true"
     * )
     *
     * @var string
     */
    public $availablilty;


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
