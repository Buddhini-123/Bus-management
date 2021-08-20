<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusRoutesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'bus_id'=>'required|max:191',
            'route_id'=>'required|max:191',
            'status'=>'required|max:191',
            'price'=>'required|max:191',
        ];
    }
}
