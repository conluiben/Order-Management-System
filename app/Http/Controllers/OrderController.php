<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $allOrders = Order::all();
        // $allOrders = Order::take(10)->get();
        $allOrders = Order::query()->orderBy('created_at','desc')->limit(10)->get();
        return view('dashboard',['allOrders'=>$allOrders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return 'store';
        $validatedData = $request->validate([
            'customer-name'      => ['required', 'string'], // Input name `customer`
            'amt-total'  => ['required', 'decimal:0,2'], // Input name `total_amount`
            'deadline'      => ['required', 'date', 'after_or_equal:today'], // Input name `due_date`
            'order-desc'      => ['required'], // Input name `order-desc`
        ]);

        $data = [
            'customer_name' => $validatedData['customer-name'],
            'order_description' => $validatedData['order-desc'],
            'amount_total' => $validatedData['amt-total'],
            'deadline' => $validatedData['deadline']
        ];
        // ? for fields with NO rules, you can write like this: 
        // 'order_description' => $request->input('order-desc', ''), // defaults to '' if no input found!

        $data['amount_settled'] = 0.00;
        $note = Order::create($data);

        return to_route('order.index', $note)->with('message','Order successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('edit',['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $rawData = $request->all();
        $data = [
            'customer_name' => $rawData['customer-name'],
            'order_description' => $rawData['order-desc'],
            'amount_total' => $rawData['amt-total'],
            'amount_settled' => $rawData['amt-settled'],
            'deadline' => $rawData['deadline']
        ];
        $order->update($data);
        return to_route('order.index', $order)->with('message','Order successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
