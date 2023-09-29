<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateEmployee extends Component
{
    #[Rule('required')]
    public $name = '';

    #[Rule('required|date')]
    public $date_of_birth = '';

    #[Rule('required|date')]
    public $start_date = '';

    #[Rule('required|exists:App\Models\User,id')]
    public $user_id = '';

    public function render()
    {
        return view('livewire.create-employee');
    }

    public function save()
    {
        $this->validate();

        $employee = Employee::create(
            $this->only(['name', 'date_of_birth', 'start_date', 'user_id']),
        );

        return redirect('/dashboard')
            ->with('status', 'Created Employee ' . $employee->name);
    }
}
