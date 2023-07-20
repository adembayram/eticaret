<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'order_code' => rand(1000000000,9999999999),
            'shoppingcart_id' => 1,
            'order_price' => 25,
            'status' => 'Siparişiniz Alındı',
            'name' => "Demo Demo",
            'address' => "İstanbul",
            'phone' => null,
            'mobile' => "05111111111",
            'bank' => "PAYTR",
            'installment' => 1
        ];
    }
}
