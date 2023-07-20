<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {


        return [
            'product_id' => 1,
            'enable_slider' => 1,
            'product_image' => 'http://bestjquery.com/tutorial/product-grid/demo7/images/img-1.jpg',
            'product_image_to' => "http://bestjquery.com/tutorial/product-grid/demo7/images/img-2.jpg",
            'enable_opportunity' => 1,
            'enable_featured' => 1,
            'enable_bestseller' => 1,
            'enable_discounted' => 1

        ];
    }
}
