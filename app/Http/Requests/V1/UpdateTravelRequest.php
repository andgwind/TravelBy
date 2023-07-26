<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTravelRequest extends FormRequest
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
            'isPublic' => 'required|boolean',
            'name' => 'required|string|unique:travels',
            'description' => 'string',
            'numberOfDays' => 'integer',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_public' => $this->isPublic,
            'number_of_days' => $this->numberOfDays,
        ]);
    }
}
