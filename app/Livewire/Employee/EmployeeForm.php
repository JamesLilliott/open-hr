<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Form;

class EmployeeForm extends Form
{
    #[Rule('required')]
    public $name = '';

    #[Rule('required|date')]
    public $date_of_birth = '';

    #[Rule('required|date')]
    public $start_date = '';

    #[Rule('required|exists:App\Models\User,id')]
    public $user_id = '';

    public function store(): Employee
    {
        $this->validate();

        return Employee::create(
            $this->all(),
        );
    }
}
