<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBusRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    //validate if the fields are empty or not
    public function rules()
    {
        return [
            'name'=>'required|max:191',
            'type'=>'required|max:191',
            'vehicle_number'=>'required|max:191',
        ];
    }
}
