@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Customer
@endsection

@section('content')
<section class="content container-fluid">
<div class="row">
<div class="col-md-12">
@includeif('partials.errors')
<div class="card card-default">
    <div class="card-header">
        <span class="card-title">{{ __('Create') }} Customer</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('customers.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="fiscal_data">{{ __('Fiscal Data') }}</label>
            <input id="fiscal_data" type="text" class="form-control" name="fiscal_data" value="{{ old('fiscal_data') }}" required>
        </div>

        <div class="form-group">
            <label for="email">{{ __('E-Mail') }}</label>
            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Create Customer') }}</button>
    </form>
</div>
</div>
</div>
</div>
</section>
@endsection
