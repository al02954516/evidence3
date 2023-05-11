<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Status;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate();

        return view('order.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        $customers = Customer::all();
        $statuses = Status::all();
        return view('order.create', compact('customers', 'statuses'));

   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        request()->validate(Order::$rules);

        $order = Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
{
    if ($order->status !== 'delivered') {
        if ($order->customer_id !== auth()->user()->id) {
            return redirect()->route('order.index');
        }
    }
    return view('order.show', compact('order'));
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $statuses = Status::all();
    
        return view('order.edit', compact('order', 'customers', 'statuses'));
    }

    public function search(Request $request)
    {
        $invoice_number = $request->input('invoice_number');
        $order = Order::where('invoice_number', $invoice_number)->first();
    
        if (!$order) {
            return view('orders.search')->withErrors(['invoice_number' => 'Invoice number not found']);
        }
    
        $order_status = $order->status;
    
        if ($order_status->name == 'Delivered') {
            $photo = $order_status->photo;
            return view('order.show')->with(['order' => $order, 'photo' => $photo]);
        } elseif ($order_status->name == 'In Process') {
            $process = $order_status->process;
            $date = $order_status->updated_at->format('d/m/Y');
            return view('order.show')->with(['order' => $order, 'process' => $process, 'date' => $date]);
        } else {
            return view('order.show')->with('order', $order);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    
public function update(Request $request, Order $order)
{
    request()->validate(Order::$rules);

    $order->update($request->all());

    if ($request->hasFile('delivered_photo')) {
        $delivered_photo_path = $request->file('delivered_photo')->store('public');
        $order->delivered_photo = str_replace('public/', '', $delivered_photo_path);
    }

    if ($request->hasFile('loaded_photo')) {
        $loaded_photo_path = $request->file('loaded_photo')->store('public');
        $order->loaded_photo = str_replace('public/', '', $loaded_photo_path);
    }

    $order->save();

    return redirect()->route('orders.index')->with('success', 'Order updated successfully');
}
}