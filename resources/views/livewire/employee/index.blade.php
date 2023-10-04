<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-4">
            <form wire:submit="search">
                <label for="search">Search</label>
                <input id="search" wire:model="query" type="text" placeholder="Search...">
                <button type="submit" class="border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2">Search</button>
            </form>
        </div>

        <div>
            <div wire:loading>
                Searching...
            </div>
            <div wire:loading.remove>
                <table class="table-auto text-left w-full">
                    <thead>
                        <tr class="border-b border-neutral-200">
                            <td class="font-bold">Name</td>
                            <td class="font-bold">Date of Birth</td>
                            <td class="font-bold">Start Date</td>
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
