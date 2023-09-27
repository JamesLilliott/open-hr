<?php

use App\Livewire\CreateEmployee;

it('renders successfully', function () {
    $this->get('/employee/create')
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/employee/create')
        ->assertSeeLivewire(CreateEmployee::class);
});
