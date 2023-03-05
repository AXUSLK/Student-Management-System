<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'min:10', 'max:12'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->student?->user_id)],
            'gender' => 'required',
            'course' => 'required',
            'address' => 'required',
            'password' => ['sometimes', 'required', 'string', 'min:8', 'same:confirm-password'],
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
