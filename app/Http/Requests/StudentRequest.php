<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'guardian_name' => 'required',
            'guardian_phone_number' => 'required|regex:/^(98)([0-9]{8})$/',
            'room_id' => 'required',
            'admitted_date'=> 'required',
            'permanent_address' => 'required',
            'phone_number' => 'required|regex:/^(98)([0-9]{8})$/',
        ];
    }
}
