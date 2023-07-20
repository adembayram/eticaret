<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        return  [
            //
            'product_code' => 'required',
            'product_name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'category' => 'required',
            'product_image' => 'required|file|image|max:5072',
            'product_image_to' => 'required|file|image|max:5072',
            'file.*'      => 'required|file|image|max:5072',
            'bodies' => 'required',
            'color' => 'required',

        ];
    }

    public function attributes()
    {
        return [

            'product_code' => 'Ürün Kodu',
            'product_name' => 'Ürün Adı',
            'stock' => 'Stok',
            'price' => 'Tutar / Fiyat',
            'category' => 'Kategori',
            'product_image' => 'Gösteri Resmi',
            'file' => 'Ürün Resimleri',
            'unit' => 'Birim',
            'product_image_to' => 'Gösteri Resmi 2',
            'color' => "Renk",
            'bodies' => "Beden"
        ];
    }
}
