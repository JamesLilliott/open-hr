<?php

namespace App\Livewire\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $query = '';

    public $sortField = 'name';

    public $sortDirection = 'ASC';

    public function sort($field)
    {
        $this->sortField = $field;
        $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $teamQuery = Team::query();

        if ($this->query !== '') {
            $teamQuery->where('name', 'LIKE', '%'.$this->query.'%');
        }
        $teamQuery->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.team.index', [
            'teams' => $teamQuery->paginate(2),
        ]);
    }
}
