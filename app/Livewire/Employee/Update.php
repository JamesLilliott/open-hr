<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Update extends Component
{
    public EmployeeForm $form;

    public function render()
    {
        return view('livewire.employee.form');
    }

    public function mount(Employee $employee)
    {
        $this->form->setEmployee($employee);
    }

    public function save()
    {
        $employee = $this->form->update();

        return redirect('/employee/')
            ->with('status', 'Updated Employee ' . $employee->name);
    }
}
