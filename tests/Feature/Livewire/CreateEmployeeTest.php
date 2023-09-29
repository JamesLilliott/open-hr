<?php

use App\Livewire\CreateEmployee;

it('renders successfully', function () {
    $this->get('/employee/create')
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/employee/create')
        ->assertSeeLivewire(CreateEmployee::class);
});

it('fails validation', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    Livewire::test(CreateEmployee::class)
        ->set('name', '')
        ->call('save')
        ->assertHasErrors('name');
});

it('Creates an Employee', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $employee = \App\Models\Employee::factory()->make();

    Livewire::test(CreateEmployee::class)
        ->set('name', $employee->name)
        ->set('date_of_birth', $employee->date_of_birth)
        ->set('start_date', $employee->start_date)
        ->set('user_id', $employee->user_id)
        ->call('save');

    $this->assertDatabaseHas($employee->getTable(), [
        'name' => $employee->name,
        'date_of_birth' => $employee->date_of_birth,
        'start_date' => $employee->start_date,
        'user_id' => $employee->user_id,
    ]);
});
