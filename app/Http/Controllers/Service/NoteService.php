<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Repository\NoteRepository;

class NoteService
{
    protected $noteRepo;

    public function __construct(NoteRepository $noteRepo)
    {
        $this->noteRepo = $noteRepo;
    }

    public function getAllNotes()
    {
        return $this->noteRepo->all();
    }

    public function createNewNote($data)
    {
        return $this->noteRepo->create($data);
    }

    public function updateNote($data)
    {
        return $this->noteRepo->update($data);
    }

    public function deleteNote($id)
    {
        return $this->noteRepo->destroy($id);
    }
}
