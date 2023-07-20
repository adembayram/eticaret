<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'pending_order' => Order::where('status', 'Siparişiniz alındı')->count(),
            'completed_order' => Order::where('status', 'Sipariş tamamlandı')->count(),
            'total_products' => Product::count(),
            'total_category' => Category::count(),
            'total_users' => User::count()

        ];

        $multi_selling_products = DB::select("
        SELECT u.product_name,SUM(su.number) number
        FROM orders si
        INNER JOIN shopping_cards s ON s.id = si.shoppingcart_id
        INNER JOIN shopping_cart_products su ON s.id = su.shoppingcart_id
        INNER JOIN products u ON u.id = su.product_id
        GROUP BY u.product_name
        ORDER BY SUM(su.number) DESC
        ");

        $sales_by_month = DB::select("
            SELECT DATE_FORMAT(si.created_at, '%Y-%m') ay, sum(su.number) number
            FROM orders si
            INNER JOIN shopping_cards s ON s.id = si.shoppingcart_id
            INNER JOIN shopping_cart_products su ON s.id=su.shoppingcart_id
            GROUP BY DATE_FORMAT(si.created_at, '%Y-%m')
            ORDER BY DATE_FORMAT(si.created_at, '%Y-%m')
        ");

        return view('admin.index', compact('data','multi_selling_products','sales_by_month'));

    }

    /**
     * Show the form for creating a new resource.
     *    * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
