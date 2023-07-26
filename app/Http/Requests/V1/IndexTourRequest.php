<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexTourRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'priceFrom' => 'numeric',
            'priceTo' => 'numeric',
            'dateFrom' => 'date',
            'dateTo' => 'date',
            'sortBy' => [
                'required_with:sortOrder',
                Rule::in(['price']),
            ],
            'sortOrder' => [
                'required_with:sortBy',
                Rule::in(['asc', 'desc']),
            ],
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'sortBy' => 'The SortBy parameter accepts only price value',
    //         'sortOrder' => 'The SortOrder parameter accepts only price value',
    //     ];
    // }
}
