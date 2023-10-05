<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
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
        $employeeQuery = Employee::query();

        if ($this->query !== '') {
            $employeeQuery->where('name', 'LIKE', '%'.$this->query.'%');
        }
        $employeeQuery->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.employee.index', [
            'employees' => $employeeQuery->paginate(2),
        ]);
    }
}
