<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Retailer;
use App\Models\order_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('adminGMP.order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ecommerce.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addOrder(Request $request, $total_price)
    {
        $retailer = Retailer::create([
            'retailers_name' => $request->retailer_name,
            'phone_number' => $request->phone_number,
            'retail_name' => $request->retail_name
        ]);

        $order = Order::create([
            'retailer_id' => $retailer->id,
            'total_price' => $total_price
        ]);

        $cart = session()->get('cart');

        foreach ($cart as $data) {
            $order_product = order_product::create([
                'product_id' => $data['product_id'],
                'order_id' => $order->id,
                'amount' => $data['amount'],
                'satuan' => $data['satuan']
            ]);
        }

        if ($retailer && $order && $order_product) {
            session()->flush();
            return redirect('/')->with(['success' => 'Barang anda telah diOrder']);
        } else {
            return redirect('/')->with(['error' => 'Barang anda gagal diOrder']);
        }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    public function detail($id){
        $orders = order_product::select('*')->where('order_id', $id)->get();
        $user = Auth::user();
        $products = DB::table('products')
        ->select('product_name', 'price')
        ->join('order_products','products.id','=','order_products.product_id')
        ->whereIn('product_id',(
                DB::table('order_products')
                ->select('product_id')
                ->join('orders','order_products.order_id','=','orders.id')
                ->where('orders.id','=', $id)
        ))->where('order_products.order_id', $id)
        ->get();
        return view('adminGMP.detail', compact('orders', 'products', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
