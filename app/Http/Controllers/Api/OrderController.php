<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // (where->'user_id', Auth::user()->id)
        $orders = Order::with('customer')->whereHas('product')->with('product',  function($q){
            $q->where('user_id',Auth::user()->id);
        })->get();
        // dd($orders);
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
         
        if ($request->payment_method == 'card' && empty($request->billing_address) || empty($request->card_number)) {
            return response()->json([
                'error_message' => 'Please enter Card Number and billiing adrress',
            ]);
        }
        $order = new Order();
        $order->quantity = 1;
        $order->total_price = $product->price;
        $order->user_id = $request->user()->id;
        $order->product_id = $request->product_id;
        $order->payment_method = $request->payment_method;
        $order->billing_address = $request->billing_address;
        $order->card_number = $request->card_number;
        $order->save();
            // Return a JSON response for API requests
            return response()->json([
                'success_message' => 'Order Created Successfully',
            ]);
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
