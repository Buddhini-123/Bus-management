<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusSeatsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            //validate if the fields are empty or not
            'bus_id'=>'required|max:191',
            'seat_number'=>'required|max:191',
            'price'=>'required|max:191',
        ];
    }
}
