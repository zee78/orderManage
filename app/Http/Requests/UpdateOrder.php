<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
          'customer_name' => 'required',
          'customer_contact' => 'required',
          'booking_date' => 'required',
          'delivery_date' => 'required',
          'neck' => 'required',
          'shoulder' => 'required',
          'arms' => 'required',
          'biceps' => 'required',
          'chest' => 'required',
          'back' => 'required',
          'belly' => 'required',
          'wc_length' => 'required',
          'pc_length' => 'required',
          'sherwani_length' => 'required',
          'kurta_length' => 'required',
          'waist' => 'required',
          'hips' => 'required',
          'thigh' => 'required',
          'knee' => 'required',
          'calf' => 'required',
          'botton' => 'required',
          'length' => 'required',
          'ref_color' => 'required',
          'ref_design' => 'required',
          'order_price' => 'required',
        ];
    }
}
