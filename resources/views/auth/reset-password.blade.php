@extends('authen.authentication')

@section('authentication-content')

<Style>
    .font-20{
        font-size: 20px;
    }
</Style>

<a class="login-a font-20">
    Reset password
</a>

<div class="container mt-5">
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', request()->email) }}" required autofocus>
            @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            @error('password_confirmation')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-brown">Reset Password</button>
        </div>
    </form>
</div>





@endsection
