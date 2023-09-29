<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="">
                <form wire:submit="save">

                    <label for="name" class="block">Name</label>
                    <input type="text" id="name" wire:model="name" class="rounded shadow-sm">
                    <div>@error('name') <span class="error">{{ $message }}</span> @enderror</div>

                    <label for="date_of_birth" class="block">Date of Birth</label>
                    <input type="date" id="date_of_birth" wire:model="date_of_birth" class="rounded shadow-sm">
                    <div>@error('date_of_birth') <span class="error">{{ $message }}</span> @enderror</div>

                    <label for="start_date" class="block">Start Date</label>
                    <input type="date" id="start_date" wire:model="start_date" class="rounded shadow-sm">
                    <div>@error('start_date') <span class="error">{{ $message }}</span> @enderror</div>

                    <label for="start_date" class="block">Start Date</label>

                    <select wire:model="user_id">
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div>@error('user_id') <span class="error">{{ $message }}</span> @enderror</div>

                    <br>

                    <button type="submit" class="float-right border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
