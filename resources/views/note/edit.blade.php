@extends('layouts.app')

@section('content')
    <div class="note-container single-note">
        <h1 class="text-3xl py-4">Edit your note</h1>
        <form action={{ route('note.update', $note) }} method="POST" class="note">
            @csrf
            @method('PUT')
            <textarea name="note" rows="10" class="note-body" placeholder="Enter your note here">{{ $note->note }}</textarea>
            <div class="note-buttons">
                <a href="{{ route('note.index') }}" class="cancel-button">Cancel</a>
                <button class="submit-button">Submit</button>
            </div>
        </form>
    </div>
@endsection
