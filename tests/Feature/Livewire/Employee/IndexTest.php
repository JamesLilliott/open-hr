<?php

use App\Livewire\Employee\Index;
use Livewire\Livewire;

it('renders successfully', function () {
    $this->get('/employee/')
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/employee')
        ->assertSeeLivewire(Index::class);
});

it('sees an empty table', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    Livewire::test(Index::class)
        ->assertSee('No data found.');
});

it('see page 1 of employee table', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    \App\Models\Employee::factory(2)->create();

    Livewire::test(Index::class)
        ->assertDontSee('No data found.');
});
