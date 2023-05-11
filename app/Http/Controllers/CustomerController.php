<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate();

        return view('customer.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * $customers->perPage());
    }

    public function create()
    {
        $customer = new Customer();
        return view('customer.create', compact('customer'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(Customer::$rules);

        $customer = Customer::create($validatedData);

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate(Customer::$rules);

        $customer->update($validatedData);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id)->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }
}