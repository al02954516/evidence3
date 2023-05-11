@extends('layouts.app')

@section('template_title')
    Order
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Order') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Create New') }}
                            </a>
                          </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Invoice Number</th>
                                    <th>Customer</th>
                                    <th>Order Date</th>
                                    <th>Delivery Address</th>
                                    <th>Notes</th>
                                    <th>Status</th>
                                    <th>Loaded Photo</th>
                                    <th>Delivered Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $order->invoice_number }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->delivery_address }}</td>
                                        <td>{{ $order->notes }}</td>
                                        <td>
                                            @if ($order->status->id == 1)
                                                Ordered
                                            @elseif ($order->status->id == 2)
                                                In process
                                            @elseif ($order->status->id == 3)
                                                En Route
                                            @elseif ($order->status->id == 4)
                                                Delivered
                                            @endif
                                        </td>
                                        <td>
    @if($order->loaded_photo)
        <img src="{{ asset($order->loaded_photo) }}" width="50px" height="50px">
    @endif
</td>
<td>
    @if($order->delivered_photo)
        <img src="{{ asset($order->delivered_photo) }}" width="50px" height="50px">
    @endif
</td>
                                        <td>
                                            <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('orders.show',$order->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('orders.edit',$order->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $orders->links() !!}
        </div>
    </div>
</div>
@endsection