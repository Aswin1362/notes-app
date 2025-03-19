@extends('layouts.app')

@push('head-scripts')
    <script id="notes-script">
        @json($notes)
    </script>
@endpush

@section('content')
    <div class="note-container">
        <a href="{{ route('note.create') }}" class="new-note-button">
            New Note
        </a>
        <div class="notes">
            @foreach ($notes as $note)
                <div class="note">
                    <div class="note-body">
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div class="note-buttons">
                        <a href="{{ route('note.show', $note) }}" class="edit-button">view</a>
                        <a href="{{ route('note.edit', $note) }}" class="edit-button">edit</a>
                        <form action={{ route('note.destroy', $note) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-6">
            {{ $notes->links() }}
        </div>
    </div>
@endsection
