<?php

namespace App\Livewire\Employee;

use Livewire\Component;

class Create extends Component
{
    public EmployeeForm $form;

    public function render()
    {
        return view('livewire.employee.form');
    }

    public function save()
    {
        $employee = $this->form->store();

        return redirect('/employee/')
            ->with('status', 'Created Employee '.$employee->name);
    }
}
