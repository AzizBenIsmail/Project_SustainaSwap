@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-default">
            <div class="card-header">
                Create User<a class="btn btn-secondary float-end mr-1  btn-sm " href="{{ route('users.index') }}"> Go Back</a>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control {{$errors->any()? !$errors->has('name')?'is-valid' :'is-invalid' :''}}" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control {{$errors->any()? !$errors->has('email')?'is-valid' :'is-invalid' :''}}" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control  {{$errors->any()? !$errors->has('password')?'is-valid' :'is-invalid' :''}}" id="password" name="password" placeholder="Password">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control  {{$errors->any()? !$errors->has('role_id')?'is-valid' :'is-invalid' :''}}" id="role" name="role_id" >
                            <option value="">-- Select an option --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"  {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->roleName }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('role_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('role_id') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-dark float-left my-2 align-center">Create User</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
