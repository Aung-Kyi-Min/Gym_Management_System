<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileEditRequest extends FormRequest
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
            
            'name' => ['required', 'string', 'min:4' , 'max:255'],
            'password' => ['nullable', 'string', 'min:8' , 'max:20'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'address' => ['required', 'max:225'],
            'gender' => ['required', 'in:male,female'],
            'age' => ['required', 'string', 'max:11' , 'integer'],
            'phone' => ['required', 'max:225' , 'integer'],
        ];
    }

}
