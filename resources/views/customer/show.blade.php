@extends('layouts.app')

@section('template_title')
    {{ $customer->name ?? __('Show Customer') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Customer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $customer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Fiscal Data:</strong>
                            {{ $customer->fiscal_data }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $customer->email }}
                        </div>

                        <hr>

                        <h4>Order History</h4>

                        <ul>
                            @foreach($customer->orders as $order)
                                <li>
                                    <a href="{{ route('orders.show', $order->id) }}">
                                        Order Invoice: {{ $order->invoice_number }} 
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection