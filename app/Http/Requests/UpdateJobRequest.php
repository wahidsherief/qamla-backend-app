<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'employer_id' => 'sometimes|integer',
            'qamla_job_category_id' => 'sometimes|string',
            'qamla_job_title_id' => 'sometimes|string',
            'deadline' => 'sometimes|date',
            'min_salary' => 'nullable|numeric',
            'max_salary' => 'nullable|numeric',
            'vacancy' => 'sometimes|integer|min:1',
            'location' => 'nullable|string',
            'educational_requirement' => 'nullable|string',
            'experience_requirement' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'responsibilities' => 'sometimes|string',
            'benefits' => 'nullable|string',
            'is_negotiable' => 'sometimes|boolean',
            'is_employed' => 'sometimes|boolean',
            'is_published' => 'sometimes|boolean',
            'is_deleted' => 'sometimes|boolean',
        ];
    }

    public function messages()
    {
        return [
            'employer_id.integer' => 'The employer ID must be an integer.',
            'qamla_job_category_id.string' => 'The job category ID must be a string.',
            'qamla_job_title_id.string' => 'The job title ID must be a string.',
            'deadline.date' => 'The deadline must be a valid date.',
            'min_salary.numeric' => 'The minimum salary must be a number.',
            'max_salary.numeric' => 'The maximum salary must be a number.',
            'vacancy.integer' => 'The vacancy must be an integer.',
            'vacancy.min' => 'The vacancy must be at least 1.',
            'location.string' => 'The location must be a string.',
            'educational_requirement.string' => 'The educational requirement must be a string.',
            'experience_requirement.string' => 'The experience requirement must be a string.',
            'additional_requirement.string' => 'The additional requirement must be a string.',
            'responsibilities.string' => 'The responsibilities must be a string.',
            'benefits.string' => 'The benefits must be a string.',
            'is_negotiable.boolean' => 'The is negotiable field must be a boolean.',
            'is_employed.boolean' => 'The is employed field must be a boolean.',
            'is_published.boolean' => 'The is published field must be a boolean.',
            'is_deleted.boolean' => 'The is deleted field must be a boolean.',
        ];
    }
}
