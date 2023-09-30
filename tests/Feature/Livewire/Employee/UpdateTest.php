<?php

it('renders successfully', function () {
    $employee = \App\Models\Employee::factory()->create();

    $this->get('/employee/update/' . $employee->id)
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/employee/update/' . $employee->id)
        ->assertSeeLivewire(\App\Livewire\Employee\Update::class);
});

it('fails validation', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $employee = \App\Models\Employee::factory()->create();

    Livewire::test(\App\Livewire\Employee\Update::class, ['employee' => $employee])
        ->set('form.name', '')
        ->set('form.date_of_birth', '')
        ->set('form.start_date', '')
        ->set('form.user_id', '')
        ->call('save')
        ->assertHasErrors(['form.name', 'form.date_of_birth', 'form.start_date', 'form.user_id']);
});

it('populates employee in field ', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $employee = \App\Models\Employee::factory()->create();

    Livewire::test(\App\Livewire\Employee\Update::class, ['employee' => $employee])
        ->assertSet('form.name', $employee->name)
        ->assertSet('form.date_of_birth', $employee->date_of_birth)
        ->assertSet('form.start_date', $employee->start_date)
        ->assertSet('form.user_id', $employee->user_id);
});

it('updates an employee', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    $employee1 = \App\Models\Employee::factory()->create();
    $employee2 = \App\Models\Employee::factory()->make();

    Livewire::test(\App\Livewire\Employee\Update::class, ['employee' => $employee1])
        ->set('form.name', $employee2->name)
        ->set('form.date_of_birth', $employee2->date_of_birth)
        ->set('form.start_date', $employee2->start_date)
        ->set('form.user_id', $employee2->user_id)
        ->call('save');

    $this->assertDatabaseHas($employee2->getTable(), [
        'name' => $employee2->name,
        'date_of_birth' => $employee2->date_of_birth,
        'start_date' => $employee2->start_date,
        'user_id' => $employee2->user_id,
    ]);
});
