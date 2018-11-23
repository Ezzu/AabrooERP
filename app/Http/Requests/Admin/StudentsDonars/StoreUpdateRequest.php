<?php

namespace App\Http\Requests\Admin\StudentsDonars;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
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
            'donar_id' => 'required',
            'student_id' => 'required',
            'sponser_type' => 'required',
        ];
    }
}
