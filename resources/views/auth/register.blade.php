@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <style>
        .auth-box {
            max-width: 400px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .auth-box h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-box a {
            color: #007bff;
        }

        .form-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>

    <div class="auth-box">
        <h2>Create Account</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required
                >
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required
                >
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
            </div>
        </form>

        <div class="form-bottom">
            Already have account? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
@endsection
