<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PlanePart;
use App\Models\ProductBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $parts = PlanePart::all();
        return view('orders.create', compact('parts'));
    }

    public function store()
    {
        $attributes = request()->validate([
            "user_id" => ['required', 'exists:users,id'],
            "supplier_id" => ['required', 'exists:suppliers,id'],
            "goods.*" => ['integer', 'distinct'],
            "amounts.*" => ['integer', 'min:1'],
        ]);
        $count = count($attributes["goods"]);
        $sum = 0;
        $delivery = 0;

        $order = new Order();
        $order->parts_count = $count;
        $order->user_id = $attributes["user_id"];
        $order->supplier_id = $attributes["supplier_id"];
        $order->sum = $sum;
        $order->expected_delivery = Carbon::now();
        $order->save();

        for ($i = 0; $i < count($attributes["goods"]); $i++) {
            $product_id = $attributes["goods"][$i];
            $amount = $attributes["amounts"][$i];

            $product = PlanePart::find($product_id);
            $sum += $product->price * $amount;
            if ($product->delivery_time > $delivery) {
                $delivery = $product->delivery_time;
            }

            $new_product = new ProductBalance();
            $new_product->amount = $amount;
            $new_product->plane_part_id = $product->id;
            $new_product->order_id = $order->id;
            $new_product->save();
        }

        $order->sum = $sum;
        $order->expected_delivery = Carbon::now()->add($delivery, 'day');
        $order->save();

        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
