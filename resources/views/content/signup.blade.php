@extends('master')

@section('title', 'Login Page')

@section('content')

    <div class="signup border my-5">
        <h1 class="mx-3">Create account</h1>
        <form action="{{ url('signup') }}" method="post" class="my-5">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName1">Username</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="">
                @error('password')
                    <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                @enderror
            </div>
            <div class="my-5">
                <a href="login" role="button" class="btn px-0 text-primary">Back</a>
                <button type="submit" class="btn btn-primary px-4 float-end">Sign Up</button>
            </div>
        </form>
    </div>

@endsection
