@extends('layouts.app')

@section('content')
    <div class="login-container">
        <form action={{ route('user.register.store') }} method="POST" class="login-form">
            @csrf
            <h1 class="text-3xl py-4">Register</h1>
            <input type="text" name="name" class="input" placeholder="Your name">
            <x-input-error :messages="$errors->get('name')" />
            <input type="email" name="email" class="input" placeholder="Email">
            <x-input-error :messages="$errors->get('email')" />
            <input type="password" name="password" class="input" placeholder="Password">
            <x-input-error :messages="$errors->get('password')" />
            <input type="password" name="password_confirmation" class="input" placeholder="Confirm Password">
            <div class="note-buttons">
                <button class="submit-button">Submit</button>
            </div>
        </form>
    </div>
@endsection
