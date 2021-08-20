<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusScheduleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'bus_route_id'=>'required|max:191',
            'direction'=>'required|max:191',
            'start_timestamp'=>'required|max:191',
            'end_timestamp'=>'required|max:191',
        ];
    }
}
