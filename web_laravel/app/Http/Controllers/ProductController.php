<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::latest()->get();
        $category = Product::select('category')->distinct()->get();
        return view('ecommerce.landing', compact('product', 'category'));
    }

    public function shop(Request $request)
    {
        $category = Product::select('category')->distinct()->get();
        $query = Product::query();

        if (isset($request->product_name) && ($request->product_name != null)) {
            $query->where('product_name', $request->product_name);
        }

        if (isset($request->min_price) && ($request->min_price != null)) {
            $query->where('price', '>=', $request->min_price);
        }

        if (isset($request->max_price) && ($request->max_price != null)) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('category') && count($request->category) > 0) {
            $query->whereIn('category', $request->category);
        }
        $product = $query->get();

        return view('ecommerce.shop', compact('product', 'category'));
    }


    public function addProductToCart(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if($request->satuan == "pcs"){
            $harga = $product->price;
            $jumlah = $request->amount;
            $total_price = $harga * $jumlah;
        } else {
            $harga = $product->price;
            $jumlah = $request->amount;
            $total_price = $harga * $jumlah * 12;
        }
        $cart[$id] = [
            "product_id" => $product->id,
            "product_name" => $product->product_name,
            "amount" => $request->amount,
            "satuan" => $request->satuan,
            "price" => $product->price,
            "file_name" => $product->file_name,
            "total_price" =>  $total_price
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }

    public function deleteProductFromCart(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        return view('adminGMP.tambahProduk', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file_name = $request->file('file_name');
        $file_name->storeAs('public/product', $file_name->hashName());
        $product = Product::create([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'price' => $request->price,
            'file_name' => $file_name->hashName(),
        ]);
        if ($product) {
            return redirect()->route('home')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data gagal disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('adminGMP.updateProduk', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        if ($request->file('file_name') == "") {
            $product->update([
                'product_name' => $request->product_name,
                'category' => $request->category,
                'price' => $request->price,
            ]);
        } else {
            Storage::disk('local')->delete('public/pegawai/' . $product->file_name);
            $file_name = $request->file('file_name');
            $file_name->storeAs('public/product', $file_name->hashName());
            $product->update([
                'product_name' => $request->product_name,
                'category' => $request->category,
                'price' => $request->price,
                'file_name' => $file_name->hashName(),
            ]);
        }
        if ($product) {
            return redirect()->route('home')->with(['success' => 'Data berhasil diubah']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        Storage::disk('local')->delete('public/product/' . $product->file_name);
        $product->delete();
        if ($product) {
            return redirect()->route('home')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data gagal dihapus']);
        }
    }
}
