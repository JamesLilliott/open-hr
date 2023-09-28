<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateEmployee extends Component
{
    #[Rule('required')]
    public $name = '';

    public function render()
    {
        return view('livewire.create-employee');
    }

    public function save()
    {
        $this->validate();

        Employee::create(
            $this->only(['name']),
        );

        return redirect('/dashboard')
            ->with('status', 'Created Employee');
    }
}
