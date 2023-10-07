<?php

use App\Livewire\Team\Create;

it('renders successfully', function () {
    $this->get('/team/create')
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/team/create')
        ->assertSeeLivewire(Create::class);
});

it('fails validation', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $result = Livewire::test(Create::class)
        ->set('form.name', '')
        ->set('form.manager_id', '')
        ->call('save')
        ->assertHasErrors(['form.name']);
});

it('Creates an Team', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $Team = \App\Models\Team::factory()->make();

    Livewire::test(Create::class)
        ->set('form.name', $Team->name)
        ->set('form.manager_id', $Team->manager_id)
        ->call('save');

    $this->assertDatabaseHas($Team->getTable(), [
        'name' => $Team->name,
        'manager_id' => $Team->manager_id,
    ]);
});
