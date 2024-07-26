@extends('layouts.auth')

@section('content')
    <div class="auth-header">
        <h1>Login Admin</h1>
    </div>
    <form method="POST" action="{{ route('login.proses') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-success">Login</button>
            <a href="{{ route('register') }}" class="btn" style="font-size: 12px">Don't have an account? Register</a>
        </div>
    </form>
@endsection
