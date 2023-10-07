<?php

namespace App\Livewire\Team;

use App\Models\Team;
use Livewire\Attributes\Rule;
use Livewire\Form;

class TeamForm extends Form
{
    public ?Team $team;

    #[Rule('required')]
    public $name = '';

    #[Rule('exists:App\Models\Employee,id')]
    public $manager_id = '';

    public function setTeam(Team $team)
    {
        $this->team = $team;
        $this->name = $team->name;
        $this->manager_id = $team->manager_id;
    }

    public function store(): Team
    {
        $this->validate();

        return Team::create(
            $this->only(['name', 'manager_id']),
        );
    }

    public function update(): Team
    {
        $this->validate();
        $this->team->update($this->only(['name', 'manager_id']));

        return $this->team;
    }
}
