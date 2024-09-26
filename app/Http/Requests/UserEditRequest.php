<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'role' => ['required'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'address' => ['required','max:225'],
            'gender' => ['required','max:225'],
            'age' => ['required','max:225' , 'integer'],
            'phone' => ['required','max:11'],
        ];
    }
}
