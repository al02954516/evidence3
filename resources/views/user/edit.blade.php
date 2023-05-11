@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select id="role" name="role" class="form-control" required>
                                    <option value="" disabled selected>{{ __('Select a role') }}</option>
                                    <option value="Sales" {{ $user->role === 'Sales' ? 'selected' : '' }}>{{ __('Sales') }}</option>
                                    <option value="Purchasing" {{ $user->role === 'Purchasing' ? 'selected' : '' }}>{{ __('Purchasing') }}</option>
                                    <option value="Warehouse" {{ $user->role === 'Warehouse' ? 'selected' : '' }}>{{ __('Warehouse') }}</option>
                                    <option value="Route" {{ $user->role === 'Route' ? 'selected' : '' }}>{{ __('Route') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="active">{{ __('Active') }}</label>
                                <select id="active" name="active" class="form-control" required>
                                    <option value="" disabled selected>{{ __('Select activity status') }}</option>
                                    <option value="Yes" {{ $user->active === 'Yes' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                    <option value="No" {{ $user->active === 'No' ? 'selected' : '' }}>{{ __('No') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection