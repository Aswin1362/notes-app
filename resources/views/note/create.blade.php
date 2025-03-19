@extends('layouts.app')

@section('content')
    <div class="note-container single-note">
        <h1 class="text-3xl py-4">Create new note</h1>
        <form action="{{ route('note.store') }}" method="POST" class="note">
            @csrf
            <textarea name="note" class="note-body" rows="10" placeholder="Enter your text here..!"></textarea>
            <div class="note-buttons">
                <a href="{{ route('note.index') }}" class="cancel-button">Cancel</a>
                <button class="submit-button">Submit</button>
            </div>
        </form>
    </div>
@endsection
