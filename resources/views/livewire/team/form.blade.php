<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="">
                <form wire:submit="save">

                    <label for="name" class="block">Name</label>
                    <input type="text" id="name" wire:model="form.name" class="rounded shadow-sm w-full">
                    <div>@error('form.name') <span class="error">{{ $message }}</span> @enderror</div>

                    <label for="manager" class="block">Manager</label>
                    <select id="manager" wire:model="form.manager_id" class="w-full">
                        <option value="">Select</option>
                        @foreach(\App\Models\Employee::all() as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                    <div>@error('form.manager_id') <span class="error">{{ $message }}</span> @enderror</div>

                    <br>

                    <button type="submit"
                            class="float-right border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2">Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
