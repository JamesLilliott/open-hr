<?php

use App\Livewire\Employee\Create;

it('renders successfully', function () {
    $this->get('/employee/create')
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/employee/create')
        ->assertSeeLivewire(Create::class);
});

it('fails validation', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $result = Livewire::test(Create::class)
        ->set('form.name', '')
        ->set('form.date_of_birth', '')
        ->set('form.start_date', '')
        ->set('form.user_id', '')
        ->call('save')
        ->assertHasErrors(['form.name', 'form.date_of_birth', 'form.start_date', 'form.user_id']);
});

it('Creates an Employee', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $employee = \App\Models\Employee::factory()->make();

    Livewire::test(Create::class)
        ->set('form.name', $employee->name)
        ->set('form.date_of_birth', $employee->date_of_birth)
        ->set('form.start_date', $employee->start_date)
        ->set('form.user_id', $employee->user_id)
        ->call('save');

    $this->assertDatabaseHas($employee->getTable(), [
        'name' => $employee->name,
        'date_of_birth' => $employee->date_of_birth,
        'start_date' => $employee->start_date,
        'user_id' => $employee->user_id,
    ]);
});
