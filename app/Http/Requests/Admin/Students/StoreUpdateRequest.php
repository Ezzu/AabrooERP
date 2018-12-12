<?php

namespace App\Http\Requests\Admin\Students;

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
//            'admission_date' => 'required',
//            'name' => 'required',
//            'gender' => 'required',
//            'date_of_birth' => 'required',
//            'cnic' => 'required',
//            'class' => 'required',
//            'roll_no' => 'required',
//            'shift' => 'required',
//            'campus' => 'required',
//
//            'father_name' => 'required',
//            'father_cnic' => 'required',
//            'father_education' => 'required',
//            'father_professional_status' => 'required',
//
//            'mother_name' => 'required',
//            'mother_cnic' => 'required',
//            'mother_education' => 'required',
//            'mother_professional_status' => 'required',
//
//            'permanent_address' => 'required',
//            'phone_no' => 'required',
//            'cell_no' => 'required',
//            'no_of_children' => 'required',
//            'male' => 'required',
//            'female' => 'required',
//            'religion' => 'required',
//            'guardian_occupation' => 'required',
//            'residential_status' => 'required',
//            'father_income' => 'required',
//            'mother_income' => 'required',
//            'other_income' => 'required',
//
//            'guarantor_name' => 'required',
//            'image' => 'required|mimes:jpeg,png|max:100',

        ];
    }
}
