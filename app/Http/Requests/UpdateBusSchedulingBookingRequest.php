<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusSchedulingBookingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bus_seats_id'=>'required|max:191',
            'user_id'=>'required|max:191',
            'bus_schedule_id'=>'required|max:191',
            'seat_number'=>'required|max:191',
            'price'=>'required|max:191',
            'status'=>'required|max:191',
        ];
    }
}
