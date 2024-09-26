<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportExcelInstructorRequest extends FormRequest
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
            'file' => 'required|file|mimes:xlsx,xls',
            'name' => 'required',
            'speciality' => 'required',
            'image' => 'required',
            'email' => 'required',
            'price' => 'required',
            'access_time' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ];
    }
}
