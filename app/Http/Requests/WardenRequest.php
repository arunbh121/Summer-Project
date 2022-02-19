<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WardenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'warden_name'=>'required',
            'email' => 'required',
            'phone_number' => 'required|regex:/^(98)([0-9]{8})$/',
            'short_descrption' => 'required',
        ];
    }
}
