<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class CreateEmployee extends Component
{
    public $name = '';

    public function render()
    {
        return view('livewire.create-employee');
    }

    public function save()
    {
        Employee::create(
            $this->only(['name']),
        );

        return redirect('/dashboard')
            ->with('status', 'Created Employee');
    }
}
