@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order Details') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>{{ __('Invoice Number') }}</th>
                                    <td>{{ $order->invoice_number }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Customer') }}</th>
                                    <td>{{ $order->customer->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Order Date') }}</th>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Delivery Address') }}</th>
                                    <td>{{ $order->delivery_address }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Notes') }}</th>
                                    <td>{{ $order->notes }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Status') }}</th>
                                    <td>{{ $order->status->name }}</td>
                                </tr>
                                @if($order->loaded_photo)
                                    <tr>
                                        <th>{{ __('Loaded Photo') }}</th>
                                        <td><img src="{{ Storage::url($order->loaded_photo) }}" alt="Loaded Photo"></td>
                                    </tr>
                                @endif
                                @if($order->delivered_photo)
                                    <tr>
                                        <th>{{ __('Delivered Photo') }}</th>
                                        <td><img src="{{ Storage::url($order->delivered_photo) }}" alt="Delivered Photo"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
