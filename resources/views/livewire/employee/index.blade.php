<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-4">
            <form wire:submit="search">
                <input id="search" wire:model="query" type="text" placeholder="Search..." class="rounded shadow-sm">
                <button type="submit" class="border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2 rounded">Search</button>
                <a href="/employee/create" class="border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2 float-right rounded">Add</a>
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
                            <td class="font-bold" wire:click="sort('date_of_birth')">Date of Birth</td>
                            <td class="font-bold" wire:click="sort('start_date')">Start Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if($employees->isEmpty())
                            <tr class="border-b border-neutral-200">
                                <td><p>No data found.</p></td>
                            </tr>
                        @endif
                        @foreach ($employees as $employee)
                            <tr class="border-b border-neutral-200">
                                <td class="">{{ $employee->name }}</td>
                                <td class="">{{ $employee->date_of_birth }}</td>
                                <td class="">{{ $employee->start_date }}</td>
                            </tr>
                      @endforeach
                    </tbody>
                </table>
                <br>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
