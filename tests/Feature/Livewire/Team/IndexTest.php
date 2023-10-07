<?php

use App\Livewire\Team\Index;
use Livewire\Livewire;

it('renders successfully', function () {
    $this->get('/team/')
        ->assertRedirectToRoute('login');

    $this->actingAs(\App\Models\User::factory()->create());

    $this->get('/team')
        ->assertSeeLivewire(Index::class);
});

it('sees an empty table', function () {
    \Illuminate\Support\Facades\DB::table('teams')->truncate();
    $this->actingAs(\App\Models\User::factory()->create());

    Livewire::test(Index::class)
        ->assertSee('No data found.');
});

it('don\'t see no data found', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    \App\Models\Team::factory(2)->create();

    Livewire::test(Index::class)
        ->assertDontSee('No data found.');
});

it('can see pagination', function () {
    $this->actingAs(\App\Models\User::factory()->create());

    \App\Models\Team::factory(4)->create();

    Livewire::test(Index::class)
        ->assertSee('paginator-page-page1');
});

it('can sort columns', function () {
    \Illuminate\Support\Facades\DB::table('teams')->truncate();
    $this->actingAs(\App\Models\User::factory()->create());

    \App\Models\Team::factory()->create(['name' => 'A Team']);
    \App\Models\Team::factory()->create(['name' => 'B Team']);
    \App\Models\Team::factory()->create(['name' => 'C Team']);

    Livewire::test(Index::class)
        ->call('sort', 'name')
        ->assertSee('C Team')
        ->assertSee('B Team')
        ->assertDontSee('A Team')
        ->call('sort', 'name')
        ->assertSee('A Team')
        ->assertSee('B Team')
        ->assertDontSee('C Team');
});
