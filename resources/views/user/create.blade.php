@extends('layouts.app')

@section('template_title')
{{ __('Create') }} User
@endsection

@section('content')
<section class="content container-fluid">
<div class="row">
<div class="col-md-12">
@includeif('partials.errors')

<div class="card card-default">
    <div class="card-header">
        <span class="card-title">{{ __('Create') }} User</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="role">{{ __('Role') }}</label>
                <select id="role" class="form-control" name="role">
                    <option value="">-- {{ __('Select Role') }} --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="active">{{ __('Active') }}</label>
                <select id="active" class="form-control" name="active">
                    <option value="">-- {{ __('Select Status') }} --</option>
                    <option value="1">{{ __('Active') }}</option>
                    <option value="0">{{ __('Inactive') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Create User') }}</button>
        </form>
    </div>
</div>
</div>
</div>
</section>
@endsection