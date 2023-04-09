<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
        return [
            'title' => ['required', 'min:3', 'unique:posts,title'],
            'description' => ['required', 'min:10'],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'image' => ['nullable', 'image']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 3 characters',
            'title.unique' => 'Title already exists',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 10 characters',
            'user_id.required' => 'User id is required',
            'user_id.exists' => 'User does not exist',
            'image.image' => 'Invalid image'
        ];
    }
}
