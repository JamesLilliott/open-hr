<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Form;

class EmployeeForm extends Form
{
    public Employee|null $employee;

    #[Rule('required')]
    public $name = '';

    #[Rule('required|date')]
    public $date_of_birth = '';

    #[Rule('required|date')]
    public $start_date = '';

    #[Rule('required|exists:App\Models\User,id')]
    public $user_id = '';

    public function setEmployee(Employee $employee)
    {
        $this->employee = $employee;
        $this->name = $employee->name;
        $this->date_of_birth = $employee->date_of_birth;
        $this->start_date = $employee->start_date;
        $this->user_id = $employee->user_id;
    }

    public function store(): Employee
    {
        $this->validate();

        return Employee::create(
            $this->only(['name', 'date_of_birth', 'start_date', 'user_id']),
        );
    }

    public function update(): Employee
    {
        $this->validate();
        $this->employee->update($this->only(['name', 'date_of_birth', 'start_date', 'user_id']));

        return $this->employee;
    }
}
