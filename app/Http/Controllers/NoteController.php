<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\NoteService;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = $this->noteService->getAllNotes();
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $data['user_id'] = request()->user()->id;

        $note = $this->noteService->createNewNote($data);
        return to_route('note.show', $note);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $data['id'] = $note['id'];

        $this->noteService->updateNote($data);
        return to_route('note.show', ['note' => $note]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $noteId = $note['id'];

        $this->noteService->deleteNote($noteId);
        return to_route('note.index', ['note' => $note]);
    }
}
