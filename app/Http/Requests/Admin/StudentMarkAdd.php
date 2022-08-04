<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudentMarkAdd extends FormRequest
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
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
            'student_id' => 'required|exists:students,id',
            'term_id' => 'required|exists:terms,id',
        ];
    }
}
