<?php

namespace App\Http\Requests\Admin\Donars;

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
            'sponsership_date' => 'required|max:255',
            'donar_name' => 'required|max:255',
            'address' => 'required|max:255',
            'cnic' => 'required|max:255',
            'area_id' => 'required',
            'phone_no' => 'required',
            // 'sponser_count' => 'required',
            'fee_per_child' => 'required',
            'payment_type_id' => 'required'
        ];
    }
}
