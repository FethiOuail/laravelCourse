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

            'name_ar' => 'required|max:100|min:3',
            'name_en' => 'required|max:100|min:3',
            'price' => 'required|numeric',
            'details_ar' => 'required|min:5',
            'details_en' => 'required|min:5',

        ];
    }

    public function messages()
    {
        return  [
            'name_en.required'   =>  __('messages.offer name required' ),
            'name_ar.required'   =>  __('messages.offer name required' ),
            'price.required'  => __('messages.offer price required'),
            'details_en.required' => __('offer details required'),
            'details_ar.required' => __('offer details required'),
            'details_en.min'  => 'أظف معلومات أكثر',
            'details_ar.min'  => 'أظف معلومات أكثر',


        ];
    }
}
