<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LivroRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required'],
            'author' => ['required'],
        ];

        if ($this->method() === 'PATCH') {
            $rules['title'] = [
                'required',
                Rule::unique('livros')->ignore($this->id),
            ];

            $rules['author'] = [
                'required',
            ];
        }

        return $rules;
    }
}
