<?php

namespace App\Http\Requests\Admin\Employees;

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
            'branch_id' => 'required',
            'department_id' => 'required|max:255',
            'job_title_id' => 'required|max:255',
            'bank_id' => 'required|max:255',
            'date_of_joining' => 'required|max:255',
            'name' => 'required|max:255',
            'gender' => 'required',
            'cnic' => 'required|numeric',
            'father_name' => 'required|max:255',
            'contact' => 'required|numeric',
            'email' => 'required|max:255',
        ];
    }
}
