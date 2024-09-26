<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCreateRequest extends FormRequest
{
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
            'name' => ['required', 'max:255' , 'min:4'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email', [ 'email.unique' => 'This email address is already in use.']],
            'password' => ['required' , 'min:8','confirmed'],
            'role' => ['required'],
            'image' => 'nullable',
            'address' => ['required','max:225'],
            'gender' => ['required','max:225'],
            'age' => ['required','max:225' , 'integer'],
            'phone' => ['required','max:11'],
        ];
    }
}
