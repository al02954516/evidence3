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
                        <form method="POST" action="{{ route('customers.update', $customer->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $customer->name) }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="fiscal_data">{{ __('Fiscal Data') }}</label>
                                <input id="fiscal_data" type="text" class="form-control" name="fiscal_data" value="{{ old('fiscal_data', $customer->fiscal_data) }}" maxlength="255">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $customer->email) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update Customer') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
