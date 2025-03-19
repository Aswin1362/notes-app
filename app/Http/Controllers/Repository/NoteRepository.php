<?php

namespace App\Http\Controllers\Repository;

use App\Models\Note;
use App\Http\Controllers\Repository\BaseRepository;

class NoteRepository extends BaseRepository
{
    protected $note;

    public function __construct(Note $note)
    {
        parent::__construct($note);
    }

    public function all()
    {
        return $this->model::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update($data)
    {
        return $this->model::query()
            ->where('id', $data['id'])
            ->update($data);
    }

    public function destroy($id)
    {
        return $this->model::destroy($id);
    }
}
