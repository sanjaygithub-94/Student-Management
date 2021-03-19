<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentMarkRequest extends FormRequest
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
            'student_id' => 'required|not_in:0',
            'maths_mark' => 'required|numeric',
            'science_mark' => 'required|numeric',
            'history_mark' => 'required|numeric',
            'term' => 'required',
        ];
    }
}
