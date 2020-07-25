<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name'    => 'required|min:3|max:100|unique:offers,name',
            'price'   => 'required|numeric',
            'details'   => 'required|min:5',
        ];
    }

    public function messages()
    {
        return  [
            'name.required'   =>  __('messages.offer name required' ),
            'price.required'  => __('messages.offer price required'),
            'details.required' => __('offer details required'),
            'details.min'  => 'أظف معلومات أكثر',
        ];
    }
}
