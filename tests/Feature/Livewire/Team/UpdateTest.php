<?php

it('renders successfully', function () {
    $team = \App\Models\Team::factory()->create();

    $this->get('/team/update/'.$team->id)
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/team/update/'.$team->id)
        ->assertSeeLivewire(\App\Livewire\Team\Update::class);
});

it('fails validation', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $team = \App\Models\Team::factory()->create();

    Livewire::test(\App\Livewire\Team\Update::class, ['team' => $team])
        ->set('form.name', '')
        ->set('form.manager_id', '')
        ->call('save')
        ->assertHasErrors(['form.name'])
        ->assertHasNoErrors(['form.manager_id']);
});

it('populates team in field ', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $team = \App\Models\Team::factory()->create();

    Livewire::test(\App\Livewire\Team\Update::class, ['team' => $team])
        ->assertSet('form.name', $team->name)
        ->assertSet('form.manager_id', $team->manager_id);
});

it('updates an team', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $team1 = \App\Models\Team::factory()->create();
    $team2 = \App\Models\Team::factory()->make();

    Livewire::test(\App\Livewire\Team\Update::class, ['team' => $team1])
        ->set('form.name', $team2->name)
        ->set('form.manager_id', $team2->manager_id)
        ->call('save');

    $this->assertDatabaseHas($team2->getTable(), [
        'name' => $team2->name,
        'manager_id' => $team2->manager_id,
    ]);
});
