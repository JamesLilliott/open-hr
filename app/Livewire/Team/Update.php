<?php

namespace App\Livewire\Team;

use App\Livewire\Employee\EmployeeForm;
use App\Models\Employee;
use App\Models\Team;
use Livewire\Component;

class Update extends Component
{
    public TeamForm $form;

    public function render()
    {
        return view('livewire.team.form');
    }

    public function mount(Team $team)
    {
        $this->form->setTeam($team);
    }

    public function save()
    {
        $team = $this->form->update();

        return redirect('/team/')
            ->with('status', 'Updated Team '.$team->name);
    }
}
