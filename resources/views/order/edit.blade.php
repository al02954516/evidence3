@extends('layouts.app')

@section('template_title')
    {{ __('Update Customer') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update Customer') }}</span>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('orders.update', $order->id) }}" role="form" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    @csrf


                            <div class="form-group">
                                <label for="invoice_number">{{ __('Invoice Number') }}</label>
                                <input id="invoice_number" type="text" class="form-control @error('invoice_number') is-invalid @enderror" name="invoice_number" value="{{ $order->invoice_number }}" required autofocus>
                                @error('invoice_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_id">{{ __('Customer') }}</label>
                                <select id="customer_id" class="form-control @error('customer_id') is-invalid @enderror" name="customer_id" required>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="order_date">{{ __('Order Date') }}</label>
                                <input id="order_date" type="datetime-local" class="form-control @error('order_date') is-invalid @enderror" name="order_date" value="{{ date('Y-m-d\TH:i', strtotime($order->order_date)) }}" required>
                                @error('order_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="delivery_address">{{ __('Delivery Address') }}</label>
                                <input id="delivery_address" type="text" class="form-control @error('delivery_address') is-invalid @enderror" name="delivery_address" value="{{ $order->delivery_address }}" required>
                                @error('delivery_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="notes">{{ __('Notes') }}</label>
                                <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes">{{ $order->notes }}</textarea>
                                @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status_id">{{ __('Status') }}</label>
                                <select id="status_id" class="form-control @error('status_id') is-invalid @enderror" name="status_id">
@foreach($statuses as $status)
<option value="{{ $status->id }}" @if($order->status_id == $status->id) selected @endif>{{ $status->name }}</option>
@endforeach
</select>
@error('status_id')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
<div class="form-group">
    <label for="delivered_photo">{{ __('Delivered Photo') }}</label>
    <input id="delivered_photo" type="file" class="form-control @error('delivered_photo') is-invalid @enderror" name="delivered_photo">
    @if ($order->delivered_photo)
        <img src="{{ asset('storage/' . $order->delivered_photo) }}" width="200">
    @endif
</div>

<div class="form-group">
    <label for="loaded_photo">{{ __('Loaded Photo') }}</label>
    <input id="loaded_photo" type="file" class="form-control @error('loaded_photo') is-invalid @enderror" name="loaded_photo">
    @if ($order->loaded_photo)
        <img src="{{ asset('storage/' . $order->loaded_photo) }}" width="200">
    @endif
</div>

        @error('delivered_photo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
</div>


                            <button type="submit" class="btn btn-primary">{{ __('Update Order') }}</button>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>                     
@endsection
