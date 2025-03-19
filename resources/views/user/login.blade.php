@extends('layouts.app')

@section('content')
    <div class="login-container">
        <form action="{{ route('user.login.store') }}" method="POST" class="login-form">
            @csrf
            <h1 class="text-3xl py-4">Login</h1>
            <input type="email" name="email" class="input" placeholder="email">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="password" name="password" class="input" placeholder="password">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="note-buttons">
                <a href="{{ route('user.register') }}" class="cancel-button">Register</a>
                <button class="submit-button">Submit</button>
            </div>
            <x-input-error :messages="$errors->get('customMessage')" />
        </form>
    </div>
@endsection
