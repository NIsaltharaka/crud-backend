<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ];
        }
    }

    public function messages()
    {
        if ($this->isMethod('post')) {
            return [
                'name.required' => 'name is required',
                'email.required' => 'email is required',
                'password.required' => 'password is required',
            ];
        } else {
            return [
                'name.required' => 'name is required',
                'email.required' => 'email is required',
                'password.required' => 'password is required',
            ];
        }
    }
}
