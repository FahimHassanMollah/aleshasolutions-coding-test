<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_group_id'         =>  'nullable',
            'title'                 =>  'required|in:Mr,Mrs,Ms,Miss',
            'first_name'            =>  'required|max:30',
            'last_name'             =>  'nullable|max:30',
            'email'                 =>  'required|unique:users,email,'.$this->user->id,
            'avatar'                =>  'nullable|file|mimes:jpeg,jpg,png',
            'password'              =>  'nullable|min:8',
            'password_confirmation' =>  'required_with:password',
            'status'                =>  'nullable|in:0,1',
            'super_admin'           =>  'nullable|in:0,1',
        ];
    }
}
