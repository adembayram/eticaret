<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderCreateRequest extends FormRequest
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
            'slider_image' => 'required|file|image|max:3072',            

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
