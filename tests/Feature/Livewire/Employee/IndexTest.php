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
    \Illuminate\Support\Facades\DB::table('employees')->truncate();
    $this->actingAs(\App\Models\User::factory()->create());

    Livewire::test(Index::class)
        ->assertSee('No data found.');
});

it('don\'t see no data found', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    \App\Models\Employee::factory(2)->create();

    Livewire::test(Index::class)
        ->assertDontSee('No data found.');
});

it('can see pagination', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    \App\Models\Employee::factory(4)->create();

    Livewire::test(Index::class)
        ->assertSee('paginator-page-page1');
});

it('can sort columns', function () {
    \Illuminate\Support\Facades\DB::table('employees')->truncate();
    $this->actingAs(\App\Models\User::factory()->create());

    \App\Models\Employee::factory()->create(['name' => 'Alice']);
    \App\Models\Employee::factory()->create(['name' => 'Bob']);
    \App\Models\Employee::factory()->create(['name' => 'Charlie']);

    Livewire::test(Index::class)
        ->call('sort', 'name')
        ->assertSee('Charlie')
        ->assertSee('Bob')
        ->assertDontSee('Alice')
        ->call('sort', 'name')
        ->assertSee('Alice')
        ->assertSee('Bob')
        ->assertDontSee('Charlie');
});
