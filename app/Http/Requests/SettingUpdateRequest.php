<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'seo_key' => 'required',            
            'mobile' => 'required',
            'mail' => 'required',
            'address' => 'required',
            'banner_enable' => 'required',            

        ];
    }

    public function attributes(){

        return [

            'title' => 'Başlık',
            'description' => 'Site Açıklama',
            'seo_key' => 'Site Anahtar Kelime',
            'mobile' => 'Mobil Telefon / GSM',
            'address' => 'Adres',
            'banner_enable' => 'Banner Durum'

        ];

    }
}
