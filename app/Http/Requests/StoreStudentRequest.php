<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'min:10', 'max:12'],
            'email' => ['email', 'max:255', Rule::unique(User::class)],
            'gender' => 'required',
            'course' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'phone.required' => 'Phone is required',
            'email.required' => 'Email is required',
            'gender.required' => 'Gender is required',
            'course.required' => 'Course is required',
            'address.required' => 'Address is required',
        ];
    }
}
