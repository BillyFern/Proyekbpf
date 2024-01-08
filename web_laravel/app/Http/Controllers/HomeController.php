<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $product = Product::latest()->get();
        // $retailer = Retailer::latest()->get();
        // $order = Order::latest()->paginate(10);
        $order = Order::latest()
            ->join('Retailers', 'Orders.retailer_id', '=', 'Retailers.id')
            ->select('Retailers.retailers_name','Retailers.phone_number', 'Orders.*')
            ->get();

        // $order_product = order_product::latest()->get();
        return view('adminGMP.dashboard', compact('product', 'order', 'user'));
    }
}
