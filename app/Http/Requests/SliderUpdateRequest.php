<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
            //
            'enable_slider' => 'required|numeric',
            'slider_title' => 'required',
            'slider_description' => 'required',
            'slider_image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'slider_link' => 'url'

        ];
    }


    public function attributes()
    {
        return [

            'enable_slider' => 'Durum',
            'slider_title' => 'Başlık',
            'slider_description' => 'Açıklama',
            'slider_image' => 'Resim',
            'slider_link' => 'Link'

        ];
    }
}
