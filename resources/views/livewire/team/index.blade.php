<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-4">
            <form wire:submit="search">
                <input id="search" wire:model="query" type="text" placeholder="Search..." class="rounded shadow-sm">
                <button type="submit" class="border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2 rounded">Search</button>
                <a href="/team/create" class="border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2 float-right rounded">Add</a>
            </form>
        </div>

        <div>
            <br>
            <div wire:loading>
                Searching...
            </div>
            <div wire:loading.remove>
                <table class="table-auto text-left w-full">
                    <thead>
                    <tr class="border-b border-neutral-200">
                        <td class="font-bold" wire:click="sort('name')">Name</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($teams->isEmpty())
                        <tr class="border-b border-neutral-200">
                            <td><p>No data found.</p></td>
                        </tr>
                    @endif
                    @foreach ($teams as $team)
                        <tr class="border-b border-neutral-200">
                            <td class="">{{ $team->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                {{ $teams->links() }}
            </div>
        </div>
    </div>
</div>
