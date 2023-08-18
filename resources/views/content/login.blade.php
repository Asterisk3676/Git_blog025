@extends('master')

@section('title', 'Login Page')

@section('content')

    <div class="signin border my-5">
        <h1 class="mx-3">Login</h1>
        <form action="{{ url('login') }}" method="post" class="my-5">
            @csrf
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
                <a href="{{ url('/signup') }}" role="button" class="btn px-0 text-primary">Create account</a>
                <button type="submit" class="btn btn-primary px-4 float-end">Login</button>
            </div>
        </form>
    </div>

@endsection
