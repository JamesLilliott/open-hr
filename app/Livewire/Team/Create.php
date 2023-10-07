<?php

namespace App\Livewire\Team;

use Livewire\Component;

class Create extends Component
{
    public TeamForm $form;

    public function render()
    {
        return view('livewire.team.form');
    }

    public function save()
    {
        $team = $this->form->store();

        return redirect('/team/')
            ->with('status', 'Created team '.$team->name);
    }
}
