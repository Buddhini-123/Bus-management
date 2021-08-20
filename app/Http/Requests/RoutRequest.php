<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }


    public function rules()
    {
        return [

            //validate if the fields are empty or not
            'node_one'=>'required|max:191',
            'node_two'=>'required|max:191',
            'route_number'=>'required|max:191',
            'distance'=>'required|max:191',
            'time'=>'required|max:191',
        ];
    }
}
