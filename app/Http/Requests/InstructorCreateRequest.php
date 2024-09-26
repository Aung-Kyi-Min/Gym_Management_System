<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorCreateRequest extends FormRequest
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
            'speciality' => ['required', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => ['required', 'email', 'max:255','unique:instructors,email'],
            'price' => ['required', 'integer', 'min:0'],
            'access_time' => ['required', 'max:255'],
            'description' => ['required'],
        ];
    }
}
